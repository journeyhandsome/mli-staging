<h3> Received a new application </h3>
<hr>
<p>There was payment to Stripe. Customer information is as follows.：</p>


<table style="width:100%">
    <tbody>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Student Information</h3></td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">First Name: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['first_name'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Last Name: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['last_name'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Gender: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['gender'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Birthdate: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['birthdate'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Grade: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['grade_level'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Student Email: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['email'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Phone: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['phone'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Nationality: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['nationality'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Address 1: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['address_1'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Address 2: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['address_2'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">City: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['city'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">State/Province: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['state'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Zip/Postal: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['zip'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Country: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['country'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Language Spoken: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['language_spoken'] }}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Emergency Contact</h3></td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Emergency Contact Full Name: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['emergency_contact_full_name'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Emergency Contact Relationship: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['emergency_contact_relationship'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Emergency Contact Email: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['emergency_contact_email'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Emergency Contact Phone: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['emergency_contact_phone'] }}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Legal Guardian Information</h3></td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Name of the Parent or Guardian: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['guardian_name'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Parent or Guardian Daytime Phone: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['guardian_daytime_phone'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Parent or Guardian Home Phone: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['guardian_home_phone'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Parent or Guardian Mobile Phone: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['guardian_mobile_phone'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Parent or Guardian Email: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['guardian_email'] }}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Summer Camp Information</h3></td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Accomodation: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['accomodation'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Program Starting Date: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['program_start_date'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Program Level: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['program_age_group'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">No. of weeks: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['program_weeks'] }}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Extra Day In Residence: $375 per day</h3></td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Number of extra nights BEFORE camp start date: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['before_camp_start'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Number of extra nights AFTER camp end date: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['after_camp_start'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Irregular Pick-up/Drop-off($160): </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['irregular_pickup_str'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Unaccompanied Minor Service($160):</td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['minor_service'] }}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Signature Section</h3></td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Signature Section Parent Name: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['terms_and_conditions_parent_name'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Signature Section Date: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['agree_terms_and_conditions_date'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Agency Name: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['agency_name'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Agency Representative Name: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['agency_rep_name'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Agency Representative Email: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['agency_rep_email'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Sales Representative: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['tamwood_sales'] }}</td>
        </tr>
    </tbody>
</table>