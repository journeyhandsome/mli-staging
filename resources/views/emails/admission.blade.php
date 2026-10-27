<h3> Received a new application </h3>
<hr>
<p>There was payment to Stripe. Customer information is as follows.：</p>
<h3>Customer information</h3>
<div>
</div>
  <table style="width:100%">
    <thead>
      <tr>
        <th style="line-height:25px;padding:10px;color:#fff;background:#167f92">Title</th>
        <th style="line-height:25px;padding:10px;color:#fff;background:#167f92">Information</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8"> First Name:</td>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['fname'] }}</td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold"> Middle name: </td>
        <td style="line-height:25px;padding:10px;background:#f8f8f8">{{ $data['mname'] }}</td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8"> Last name: </td>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['lname'] }}</td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold"> Birthday: </td>
        <td style="line-height:25px;padding:10px;font-weight:bold">{{ $data['birthday'] }}</td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8"> Gender: </td>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8"> {{ $data['gender'] }} </td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold"> TEL: </td>
        <td style="line-height:25px;padding:10px;font-weight:bold">{{ $data['phone'] }}</td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8"> Email: </td>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8"><a href="mailto:{{ $data['email'] }}" target="_blank">{{ $data['email'] }}</a></td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold"> Campus: </td>
        <td style="line-height:25px;padding:10px;font-weight:bold">{{ $data['campus'] }}</td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold"> Nationality: </td>
        <td style="line-height:25px;padding:10px;font-weight:bold">{{ $data['nationality'] }}</td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8"> Current country of residence: </td>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['country'] }}</td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold"> Will you study as a F1 student visa? </td>
        <td style="line-height:25px;padding:10px;font-weight:bold">{{ $data['student_visa_application'] }}</td>
      </tr>
    </tbody>
  </table>
</div>
<h3>Application</h3>
<div>
  <table style="width:100%">
    <thead>
      <tr>
        <th style="line-height:25px;padding:10px;color:#fff;background:#ea6153">Title</th>
        <th style="line-height:25px;padding:10px;color:#fff;background:#ea6153">Information</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8"> Class start date</td>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['lesson_start_date'] }}</td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold"> Accommodation Arrangements</td>
        <td style="line-height:25px;padding:10px;font-weight:bold">{{ $data['accommodation_arrangements'] }}</td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold">Length of Program</td>
        <td style="line-height:25px;padding:10px;font-weight:bold">{{ $data['length_of_program'] }}</td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Question and special request</td>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['message'] }}</td>
      </tr>
      <tr>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Promo Code</td>
        <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['promo_code'] }}</td>
      </tr>
    </tbody>
  </table>
</div>