{{ $mailData['title'] }} <br>
{{ $mailData['body'] }}  click the below link to activate your account 

<br>

http://127.0.0.1:8000/activate/{{ $mailData['email'] }}/{{ $mailData['token'] }}