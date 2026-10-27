Sent from "Contact [{{ global_lang_description($language) }}]".
<?=nl2br("\r\n")?>
Name: {{ $data['name'] }}
<?=nl2br("\r\n")?>
Email: {{ $data['email'] }}
<?=nl2br("\r\n")?>
Country: {{ $data['country'] }}
<?=nl2br("\r\n")?>
Phone: {{ $data['phone'] }}
{!! '<br>' !!}
Should MLI Call? {{ ($data['phone_call'] == 1) ? 'Yes' : 'No' }}
{!! '<br>' !!}
Campus: {{ $data['campus'] }}
{!! '<br>' !!}
How did you know MLI?: {{ $data['media'] }}
{!! '<br>' !!}
Lead-log: {{ $data['utm_source'] }}
{!! '<br>' !!}
Start: {{ $data['time_to_start'] }}
{!! '<br>' !!}
Message: {{ $data['message'] }}
{!! '<br>' !!}{!! '<br>' !!}
--
{!! '<br>' !!}
This e-mail was sent from a contact form on Mentor Language Institute (http://mliesl.edu)
