<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDO;

class AdminController extends Controller
{
    public $adminData;
    //

    public function setData(string $adminData)
    {
        $this->adminData = $adminData;
        $this->adminData = DB::table('admin')->get();
    }
    public function index()
    {
        $adminData = DB::table('admin')->get();
        return view('index', compact('adminData'));
    }

    public function user()
    {
        $usersData = User::where('role', '=', '0')->paginate(5);

        $adminData = DB::table('admin')->get();
        return view('users')->with(compact('usersData', 'adminData'));
    }

    public function products_daily()
    {
        $adminData = DB::table('admin')->get();
        return view('blueprint.Daily_products', compact('adminData'));
    }

    public function products_available()
    {
        $dataOfItemsTable = DB::table('items')->paginate(6);

        $adminData = DB::table('admin')->get();
        return view('blueprint.Available_products', compact('dataOfItemsTable', 'adminData'));
    }
    public function add_user()
    {
        $adminData = DB::table('admin')->get();
        return view('blueprint.AddUser', compact('adminData'));
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric|digits:10',
            'password' => 'required',
            'profile' => 'mimes:png,jpg,avif,jpeg',
            'address' => 'required',
        ]);

        if ($request->has('profile')) {
            $file = $request->file('profile')->getClientOriginalName();
            $userData = new User();
            $userData->name = $request->name;
            $userData->email = $request->email;
            $userData->mobile = $request->mobile;
            $userData->password = $request->password;
            $userData->address = $request->address;
            $userData->profile = $file;
            $userData->status = 'Active';
            $userData->created_at = today();
            $userData->updated_at = today();
            if ($userData->save()) {
                $request->profile->move(public_path('Images/Profiles/'), $file);

                session()->flash('Success', 'Data inserted successfully');
            } else {
                session()->flash('Error', 'Data not inserted');
            }
        } else {
            $userData = new User();
            $userData->name = $request->name;
            $userData->email = $request->email;
            $userData->mobile = $request->mobile;
            $userData->password = $request->password;
            $userData->address = $request->address;
            $userData->profile = 'default.jpg';
            $userData->status = 'Active';
            $userData->created_at = today();
            $userData->updated_at = today();
            if ($userData->save()) {
                session()->flash('Success', 'Data inserted successfully');
            } else {
                session()->flash('Error', 'Data not inserted');
            }
        }
        return redirect()->route('users');
    }
    public function user_deactive(string $email)
    {
        $user_email = User::where('email', '=', $email)->first();
        if ($user_email) {
            $update_query_user = User::where('email', '=', $email)
                ->where('status', '=', 'Active')
                ->update(['status' => 'Inactive']);
            if ($update_query_user) {
                session()->flash('Success', 'Status updated successfully');
                return redirect()->route('users');
            }
        } else {
            session()->flash('Error', 'There is no user named : ' . $email);
            return redirect()->route('users');
        }
    }
    public function user_active(string $email)
    {
        $user_email = User::where('email', '=', $email)->first();
        if ($user_email) {
            $user_email = User::where('email', '=', $email)
                ->where('status', '=', 'Inactive')
                ->update(['status' => 'Active']);
            session()->flash('Success', 'Status Updated successfully');
            return redirect()->route('users');
        } else {
            session()->flash('Error', 'There is no user named : ' . $user_email);
            return redirect()->route('users');
        }
    }
    public function user_edit(string $email)
    {
        $user_email = User::where('email', '=', $email)->first();
        if ($user_email) {
            $adminData = DB::table('admin')->get();

            return view('blueprint.user_edit')->with(compact('user_email', 'adminData'));
        } else {
            session()->flash('Error', 'There is no user as ' . $email);
            return redirect()->route('users');
        }
    }
    public function user_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'address' => 'required',
            'profile' => 'mimes:png,jpg,jpeg,avif',
        ]);

        $user_data = User::where('email', '=', $request->email)->first();
        if ($request->has('profile')) {
            $profile = 'Images/Profiles/' . $user_data->profile;
            $newFilePath = $request->file('profile')->getClientOriginalName();
            $request->profile->move(public_path('Images/Profiles'), $newFilePath);
            $user_data->where('email', '=', $request->email)->update(['name' => $request->name, 'mobile' => $request->mobile, 'password' => $request->password, 'address' => $request->address, 'profile' => $newFilePath]);
            session()->flash('Success', 'Data updated successfully');
        } else {
            $user_data->where('email', '=', $request->email)->update(['name' => $request->name, 'mobile' => $request->mobile, 'password' => $request->password, 'address' => $request->address]);
            session()->flash('Success', 'Data updated successfully');
        }
        return redirect()->route('users');
    }

    public function reactive_user($email)
    {
        $user_email = User::where('email', '=', $email)->first();
        if ($user_email) {
            $user_email = User::where('email', '=', $email)
                ->where('status', '=', 'Deleted')
                ->update(['status' => 'Active']);
            session()->flash('Success', 'Status Updated successfully');
            return redirect()->route('users');
        } else {
            session()->flash('Error', 'There is no user named : ' . $user_email);
            return redirect()->route('users');
        }
    }
    public function delete_user($email)
    {
        $user_email = User::where('email', '=', $email)->first();
        if ($user_email) {
            $user_demo = User::where('email', '=', $email)->update(['status' => 'Deleted']);
            if ($user_demo) {
                session()->flash('Success', 'Status Updated successfully');
                return redirect()->route('users');
            }
        } else {
            session()->flash('Error', 'There is no user named : ' . $user_email);
            return redirect()->route('users');
        }
    }
    public function categoryShow()
    {
        $category_data = DB::table('category')->get();

        $adminData = DB::table('admin')->get();
        return view('blueprint.category')->with(compact('category_data', 'adminData'));
    }
    public function categoryAdd()
    {
        $adminData = DB::table('admin')->get();
        return view('blueprint.category_add', compact('adminData'));
    }
    public function category_store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        DB::table('category')->insert([
            'category_name' => $request->category_name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        session()->flash('Success', 'Category added successfully');
        return redirect()->route('category');
    }
    public function category_activate(string $name)
    {
        $category = DB::table('category')
            ->where('category_name', '=', $name)
            ->first();
        if ($category) {
            DB::table('category')
                ->where('category_name', '=', $name)
                ->where('category_status', '=', 'Inactive')
                ->update(['category_status' => 'Active']);
            session()->flash('Success', 'Status updated successfully');
            return redirect()->route('category');
        } else {
            session()->flash('Error', 'No Category named ' . $name . ' found');
            return redirect()->route('category');
        }
    }
    public function category_deactivate(string $name)
    {
        $category = DB::table('category')
            ->where('category_name', '=', $name)
            ->first();
        if ($category) {
            DB::table('category')
                ->where('category_name', '=', $name)
                ->where('category_status', '=', 'Active')
                ->update(['category_status' => 'Inactive']);
            session()->flash('Success', 'Status updated successfully');
            return redirect()->route('category');
        } else {
            session()->flash('Error', 'No Category named ' . $name . ' found');
            return redirect()->route('category');
        }
    }
    public function category_reactivate(string $name)
    {
        $category = DB::table('category')
            ->where('category_name', '=', $name)
            ->first();
        if ($category) {
            DB::table('category')
                ->where('category_name', '=', $name)
                ->where('category_status', '=', 'Deleted')
                ->update(['category_status' => 'Active']);
            session()->flash('Success', 'Status updated successfully');
            return redirect()->route('category');
        } else {
            session()->flash('Error', 'No Category named ' . $name . ' found');
            return redirect()->route('category');
        }
    }

    public function category_delete(string $name)
    {
        $category = DB::table('category')
            ->where('category_name', '=', $name)
            ->first();
        if ($category) {
            DB::table('category')
                ->where('category_name', '=', $name)
                ->update(['category_status' => 'Deleted']);
            session()->flash('Success', 'Status updated successfully');
            return redirect()->route('category');
        } else {
            session()->flash('Error', 'No Category named ' . $name . ' found');
            return redirect()->route('category');
        }
    }
    public function category_edit($name)
    {
        $category = DB::table('category')
            ->where('category_name', '=', $name)
            ->first();
        if ($category) {
            $adminData = DB::table('admin')->get();
            return view('blueprint.category_edit', compact('category', 'adminData'));
        } else {
            session()->flash('Error', "Category named $name not found");
            return redirect()->route('category');
        }
    }
    public function category_update(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        $update = DB::table('category')
            ->where('id', '=', $request->category_id)
            ->update(['category_name' => $request->category_name]);
        if ($update) {
            session()->flash('Success', 'Category updated successfully');
        } else {
            session()->flash('Error', 'Error in updating the data');
        }
        return redirect()->route('category');
    }
    public function product_add()
    {
        $category = DB::table('category')->get();
        $adminData = DB::table('admin')->get();
        return view('blueprint.product_add', compact('category', 'adminData'));
    }
    public function products_store(Request $request)
    {
        $request->validate(
            [
                'item_name' => 'required|alpha',
                'item_price' => 'required|numeric',
                'item_category' => 'required',
                'item_image' => 'required|mimes:png,jpg,jpeg,avif',
            ],
            [
                'item_name.required' => 'This field is required',
                'item_name.alpha' => 'Only Alphabetic characters allowed',
                'item_price.required' => 'This Field is required',
                'item_price.numeric' => 'Only Numeric values are allowed',
                'item_image.required' => 'This Field is required',
                'item_category.required' => 'This Field is required',
                'item_image.mimes' => 'Only png , jpg , jpeg , avif format is allowed ',
            ],
        );

        $imageOriginalName = $request->file('item_image')->getClientOriginalName();

        $itemAddQuery = DB::table('items')->insert([
            'item_name' => $request->item_name,
            'item_price' => $request->item_price,
            'item_category' => $request->item_category,
            'item_status' => 'Active',
            'item_image' => $imageOriginalName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($itemAddQuery) {
            session()->flash('Success', 'The item is Added successfully');
            $request->item_image->move(public_path('Images/Profiles/'), $imageOriginalName);
        } else {
            session()->flash('Error', 'Item not Added');
        }

        return redirect()->route('products.available');
    }

    public function products_deactivate(string $item_name)
    {
        $proQuery = DB::table('items')
            ->where('item_name', '=', $item_name)
            ->where('item_status', '=', 'Active')
            ->first();
        if ($proQuery) {
            $resultOfProQuery = DB::table('items')
                ->where('item_name', '=', $item_name)
                ->where('item_status', '=', 'Active')
                ->update(['item_status' => 'Inactive']);
            $resultOfProQuery ? session()->flash('Success', 'Item Status Updated Successfully') : session()->flash('Error', 'Error in Status Updating');
        } else {
            session()->flash('Error', "There is no item exists like $item_name or item is deactivated");
        }
        return redirect()->route('products.available');
    }

    public function products_activate(string $item_name)
    {
        $proQuery = DB::table('items')
            ->where('item_name', '=', $item_name)
            ->where('item_status', '=', 'Inactive')
            ->first();
        if ($proQuery) {
            $resultOfProQuery = DB::table('items')
                ->where('item_name', '=', $item_name)
                ->where('item_status', '=', 'Inactive')
                ->update(['item_status' => 'Active']);
            $resultOfProQuery ? session()->flash('Success', 'Item Status Updated Successfully') : session()->flash('Error', 'Error in Status Updating');
        } else {
            session()->flash('Error', "There is no item exists like $item_name or item is already Active");
        }
        return redirect()->route('products.available');
    }

    public function products_delete(string $item_name)
    {
        $proQuery = DB::table('items')
            ->where('item_name', '=', $item_name)
            ->first();
        if ($proQuery) {
            $resultOfProQuery = DB::table('items')
                ->where('item_name', '=', $item_name)
                ->update(['item_status' => 'Deleted']);
            $resultOfProQuery ? session()->flash('Success', 'Item Status Updated Successfully') : session()->flash('Error', 'Error in Status Updating');
        } else {
            session()->flash('Error', "There is no item exists like $item_name");
        }
        return redirect()->route('products.available');
    }

    public function products_reactivate(string $item_name)
    {
        $proQuery = DB::table('items')
            ->where('item_name', '=', $item_name)
            ->where('item_status', '=', 'Deleted')
            ->first();
        if ($proQuery) {
            $resultOfProQuery = DB::table('items')
                ->where('item_name', '=', $item_name)
                ->where('item_status', '=', 'Deleted')
                ->update(['item_status' => 'Active']);
            $resultOfProQuery ? session()->flash('Success', 'Item Status Updated Successfully') : session()->flash('Error', 'Error in Status Updating');
        } else {
            session()->flash('Error', "There is no item exists like $item_name or item is already Reactivated");
        }
        return redirect()->route('products.available');
    }

    public function products_edit(string $item_name)
    {
        $adminData = DB::table('admin')->get();
        $item = DB::table('items')
            ->where('item_name', '=', $item_name)
            ->first();
        $item_category = DB::table('category')
            ->join('items', 'items.item_category', '<>', 'category.category_name')
            ->where('item_name', '=', $item_name)
            ->get();

        if ($item and $item_category) {
            return view('blueprint.products_edit', compact('item', 'item_category', 'adminData'));
        } else {
            session()->flash('Error', "There is not item like $item_name");
            return redirect()->route('products.available');
        }
    }

    public function products_update(Request $request)
    {
        $request->validate(
            [
                'item_name' => 'required|alpha',
                'item_price' => 'required|numeric',
                'item_category' => 'required',
                'item_image' => 'mimes:png,jpg,jpeg,avif',
            ],
            [
                'item_name.required' => 'This field is required',
                'item_name.alpha' => 'Only Alphabetic characters allowed',
                'item_price.required' => 'This Field is required',
                'item_price.numeric' => 'Only Numeric values are allowed',
                'item_category.required' => 'This Field is required',
                'item_image.mimes' => 'Only png , jpg , jpeg , avif format is allowed ',
            ],
        );

        if ($request->has('item_image')) {
            $fileOriginalName = $request->file('item_image')->getClientOriginalName();
            $file_path = "Images/Profiles/$request->item_image";
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $updatedQuery = DB::table('items')
                ->where('item_name', '=', $request->item_name)
                ->update(['item_name' => $request->item_name, 'item_price' => $request->item_price, 'item_category' => $request->item_category, 'item_image' => $fileOriginalName]);
            if ($updatedQuery) {
                $request->item_image->move(public_path('Images/Profiles/'), $fileOriginalName);
                session()->flash('Success', 'Data Updated successfully');
            } else {
                session()->flash('Error', 'Error in data updation');
            }
        } else {
            $update = DB::table('items')
                ->where('item_name', '=', $request->item_name)
                ->update(['item_name' => $request->item_name, 'item_price' => $request->item_price, 'item_category' => $request->item_category]);
            if ($update) {
                session()->flash('Success', 'Data Updated successfully');
            } else {
                session()->flash('Error', 'Error in Data Updation');
            }
        }

        return redirect()->route('products.available');
    }

    public function create_services()
    {
        $adminData = DB::table('admin')->get();
        $service_record = DB::table('services')->paginate(3);
        return view('blueprint.services', compact('service_record', 'adminData'));
    }
    public function add_services()
    {
        $adminData = DB::table('admin')->get();
        return view('blueprint.AddService', compact('adminData'));
    }

    public function services_store(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            'service_price' => 'numeric|required',
            'service_includes' => 'required',
            'service_image' => 'required|mimes:png,jpg,jpeg,avif',
        ]);

        $service = explode(' ', $request->service_includes);

        $serviceWithImplode = implode(',', $service);

        $serviceFile = $request->file('service_image')->getClientOriginalName();

        $serviceInsertQueryResult = DB::table('services')->insertOrIgnore([
            'Service_name' => $request->service_name,
            'Service_price' => $request->service_price,
            'Service_includes' => $serviceWithImplode,
            'Service_status' => 'Active',
            'Service_image' => $serviceFile,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if ($serviceInsertQueryResult) {
            $request->service_image->move(public_path('Images/Profiles/'), $serviceFile);
            session()->flash('Success', 'Service Added Successfully');
        } else {
            session()->flash('Error', 'Service not added');
        }

        return redirect()->route('services.available');
    }

    public function service_deactivate(string $service_name)
    {
        $findService = DB::table('services')
            ->where('Service_name', '=', $service_name)
            ->where('Service_status', '=', 'Active')
            ->first();
        if ($findService) {
            DB::table('services')
                ->where('Service_name', $service_name)
                ->where('Service_status', 'Active')
                ->update(['Service_status' => 'Inactive']);
            session()->flash('Success', 'Service status updated successfully');
        }
        return redirect()->route('services.available');
    }

    public function service_activate(string $service_name)
    {
        $serviceCheck = DB::table('services')
            ->where('Service_name', $service_name)
            ->where('Service_status', 'Inactive')
            ->first();
        if ($serviceCheck) {
            DB::table('services')
                ->where('Service_name', $service_name)
                ->where('Service_status', 'Inactive')
                ->update(['Service_status' => 'Active']);
            session()->flash('Success', 'Service status updated successfully');
        }

        return redirect()->route('services.available');
    }

    public function service_delete(string $service_name)
    {
        $serviceCheck = DB::table('services')
            ->where('Service_name', $service_name)
            ->first();
        if ($serviceCheck) {
            DB::table('services')
                ->where('Service_name', $service_name)
                ->update(['Service_status' => 'Deleted']);
            session()->flash('Success', 'Service status Updated successfully');
        }

        return redirect()->route('services.available');
    }

    public function service_reactivate(string $service_name)
    {
        $checkServiceIsDeletedOrNot = DB::table('services')
            ->where('Service_name', $service_name)
            ->where('Service_status', 'Deleted')
            ->first();
        if ($checkServiceIsDeletedOrNot) {
            DB::table('services')
                ->where('Service_name', $service_name)
                ->where('Service_status', 'Deleted')
                ->update(['Service_status' => 'Active']);
            session()->flash('Success', 'Service status updated successfully');
        }

        return redirect()->route('services.available');
    }

    public function service_edit(string $service_name)
    {
        $services = DB::table('services')
            ->where('Service_name', $service_name)
            ->first();
        $adminData = DB::table('admin')->get();
        return $services ? view('blueprint.EditService', compact('services', 'adminData')) : redirect()->route('services.available');
    }

    public function service_update(Request $request)
    {
        $inc = explode(' ', $request->input('service_includes'));
        $includes = implode(',', $inc);
        if ($request->has('service_image')) {
            $filepath = "Images/Profiles/$request->service_image";
            $newFilePath = $request->file('service_image')->getClientOriginalName();
            if (File::exists($filepath)) {
                File::delete($filepath);
            }
            $serviceUpdateQueryResult = DB::table('services')
                ->where('Service_name', $request->input('service_name'))
                ->update(['Service_price' => $request->input('service_price'), 'Service_includes' => $includes, 'Service_image' => $newFilePath]);
            if ($serviceUpdateQueryResult) {
                $request->service_image->move(public_path('Images/Profiles'), $newFilePath);
                session()->flash('Success', 'Service updated successfully');
            } else {
                session()->flash('Error', 'Error in service updating');
            }
        } else {
            $serviceUpdateQueryResultWithoutFile = DB::table('services')
                ->where('Service_name', $request->input('service_name'))
                ->update(['Service_price' => $request->input('service_price'), 'Service_includes' => $includes]);
            $serviceUpdateQueryResultWithoutFile ? session()->flash('Success', 'Service updated successfully') : session()->flash('Error', 'Error in updating service');
        }
        return redirect()->route('services.available');
    }
    public function admin_login_validate(Request $request)
    {
        $request->validate(
            [
                'Email' => 'required|email',
                'Password' => 'required',
            ],
            [
                'Email.required' => 'Email Field is required',
                'Email.email' => 'Email Field must be type of email',
                'Password.required' => 'Password Field is required',
            ],
        );
        $admin_query = DB::table('admin')
            ->where('admin_email', $request->Email)
            ->where('admin_password', $request->Password)
            ->first();
        if ($admin_query) {
            session()->put('admin_email', $request->Email);
            session()->put('admin_password', $request->Password);
            return redirect()->route('admin_dashboard');
        } else {
            return redirect()->route('admin.login');
        }
    }
    public function logout()
    {
        session()->forget('admin_email');
        session()->forget('admin_password');
        return redirect()->route('admin_dashboard');
    }
    public function service_purchased()
    {
        $adminData = DB::table('admin')->get();
        return view('blueprint.PurchasedService', compact('adminData'));
    }

    public function admin_edit()
    {
        $adminData = DB::table('admin')->get();
        return view('blueprint.admin_edit', compact('adminData'));
    }

    public function admin_update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required|digits:10|numeric',
                'pic' => 'mimes:jpg,png,jpeg,avif',
            ],
            [],
        );

        if ($request->has('pic')) {
            $pic_path = 'images/admin/' . $request->pic;

            if (File::exists($pic_path)) {
                File::delete($pic_path);
            }
            $fileOriginalName = $request->file('pic')->getClientOriginalName();
            $adminUpdateQuery = DB::table('admin')
                ->where('admin_email', $request->email)
                ->update(['admin_name' => $request->name, 'admin_number' => $request->phone, 'admin_profile' => $fileOriginalName]);
            if ($adminUpdateQuery) {
                $request->pic->move('Images/admin/', $fileOriginalName);
                session()->flash('Success', 'Profile Successfully updated');
            } else {
                session()->flash('Error', 'Profile Error');
            }
        } else {
            $adminUpdateQuery = DB::table('admin')
                ->where('admin_email', $request->email)
                ->update(['admin_name' => $request->name, 'admin_number' => $request->phone]);
            $adminUpdateQuery ? session()->flash('Success', 'Profile Successfully updated') : session()->flash('Error', 'Profile Error');
        }
        return redirect()->route('admin.edit');
    }

    public function admin_change_password()
    {
        $adminData = DB::table('admin')->get();
        return view('blueprint.admin_change_password', compact('adminData'));
    }
    public function admin_change_password_validate(Request $request)
    {
        $request->validate([
            'old_pass' => 'required',
            'new_pass' => 'required|confirmed',
            'new_pass_confirmation' => 'required',
        ]);
    }
}
