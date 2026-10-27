Sent from "LPTF [{{ global_lang_description($data['language']) }}]".
{!! '<br>' !!}
Name: {{ $data['name'] }}
{!! '<br>' !!}
Email: {{ $data['email'] }}
{!! '<br>' !!}
Phone: {{ $data['phone'] }}
{!! '<br>' !!}
Should MLI Call? {{ ($data['receiving'] == 1) ? 'Yes' : 'No' }}
{!! '<br>' !!}
Campus: {{ $data['campus'] }}
{!! '<br>' !!}
How did you know MLI?: {{ $data['reference'] }}
{!! '<br>' !!}
Lead-log: {{ $data['utm_source'] }}
{!! '<br>' !!}
Start: {{ $data['program'] }}
{!! '<br>' !!}
Message: {{ $data['message'] }}
{!! '<br>' !!}{!! '<br>' !!}
--
{!! '<br>' !!}
This e-mail was sent from a lptf form on Mentor Language Institute (http://mliesl.edu)