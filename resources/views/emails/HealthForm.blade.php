<h3> Customer Health Form </h3>
<hr>

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
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Physical Restrictions: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['physical_restrictions'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Allergies: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['known_allergies'] }} {{ $data['allergies_note'] }}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Diet and Nutrition</h3></td>
        </tr>
        <tr>
            <td colspan="2" style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['diet_nutrition_str'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Please provide specific details about diet and nutrition:</td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['diet_note'] }}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Immunization Records</h3></td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Diptheria, tetanus, pertussis (DTap): </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['diptheira_tetanus_pertussis_date'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Polio (iPv): </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['polio_date'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Tetanus booster (dT) or (TdaP): </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['tetanus_booster_date'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Haemophilus influenza type B (HiB): </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['haemophilus_influenza_date'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Mumps, measles, rubella (MMR): </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['mumps_measles_rubella_date'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Pneumococcal (PCv): </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['pneumococcal_date'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Hepatitis B: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['hepatitis_b_date'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Hepatitis A: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['hepatitis_a_date'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Varicella (Chicken pox): </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['chicken_pox_date'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Meningococcal meningitis (MCv4): </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['meningococcal_meningitis_date'] }}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Immunization Consent</h3></td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Signature of Custodial Parent/Guardian: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['sign_of_custodial_parent'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Relationship: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['custodial_parent_relationship'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Date: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['custodial_parent_date'] }}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Medication</h3></td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Non-Prescription Medication</h3></td>
        </tr>
        <tr>
            <td colspan="2" style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">
                <table style="width:100%;border-collapse: collapse;">
                    <tr>
                        <th style="border: 1px solid; padding: 8px;">Name of medication</th>
                        <th style="border: 1px solid; padding: 8px;">Reason for taking</th>
                        <th style="border: 1px solid; padding: 8px;">Amount/dose-given</th>
                        <th style="border: 1px solid; padding: 8px;">Frequency</th>
                        <th style="border: 1px solid; padding: 8px;">Time of Day</th>
                    </tr>
                    @foreach($data['non_prescription_medicine_arr'] as $nonPrescMed)
                        <tr>
                            <td style="border: 1px solid; padding: 8px;">{{ $nonPrescMed['name_of_medication'] }}</td>
                            <td style="border: 1px solid; padding: 8px;">{{ $nonPrescMed['reason_for_taking'] }}</td>
                            <td style="border: 1px solid; padding: 8px;">{{ $nonPrescMed['amount_dose_given'] }}</td>
                            <td style="border: 1px solid; padding: 8px;">{{ $nonPrescMed['frequency'] }}</td>
                            <td style="border: 1px solid; padding: 8px;">{{ $nonPrescMed['time_of_day'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Prescription Medication</h3></td>
        </tr>
        <tr>
            <td colspan="2" style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">
                <table style="width:100%;border-collapse: collapse;">
                    <tr>
                        <th style="border: 1px solid; padding: 8px;">Name of medication</th>
                        <th style="border: 1px solid; padding: 8px;">Reason for taking</th>
                        <th style="border: 1px solid; padding: 8px;">Amount/dose-given</th>
                        <th style="border: 1px solid; padding: 8px;">Frequency</th>
                        <th style="border: 1px solid; padding: 8px;">Time of Day</th>
                    </tr>
                    @foreach($data['prescription_medicine_arr'] as $prescMed)
                        <tr>
                            <td style="border: 1px solid; padding: 8px;">{{ $prescMed['name_of_medication'] }}</td>
                            <td style="border: 1px solid; padding: 8px;">{{ $prescMed['reason_for_taking'] }}</td>
                            <td style="border: 1px solid; padding: 8px;">{{ $prescMed['amount_dose_given'] }}</td>
                            <td style="border: 1px solid; padding: 8px;">{{ $prescMed['frequency'] }}</td>
                            <td style="border: 1px solid; padding: 8px;">{{ $prescMed['time_of_day'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Medicine that should NOT be given</h3></td>
        </tr>
        <tr>
            <td colspan="2" style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['medicine_to_not_be_given_str'] }}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>General Health History</h3></td>
        </tr>
        <tr>
            <td colspan="2" style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">
                <table style="width:100%;border-collapse: collapse;">
                    @foreach($data['general_health_history_arr'] as $genHistory)
                        <tr>
                            <td style="border: 1px solid; padding: 8px;">{{ $genHistory['label'] }}</td>
                            <td style="border: 1px solid; padding: 8px;">{{ $genHistory['answer'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Mental, Emotional and Social Health</h3></td>
        </tr>
        <tr>
            <td colspan="2" style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">
                <table style="width:100%;border-collapse: collapse;">
                    @foreach($data['mental_emotional_health_arr'] as $mentalHistory)
                        <tr>
                            <td style="border: 1px solid; padding: 8px;">{{ $mentalHistory['label'] }}</td>
                            <td style="border: 1px solid; padding: 8px;">{{ $mentalHistory['answer'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Parent's Authorization</h3></td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Parent's First Name: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['parent_first_name'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Parent's Last Name: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['parent_last_name'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Date: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['authorization_date'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Relationship to the Camper: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['relation_to_camper'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Additional Comments: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['additional_comments'] }}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 35px;"><h3>Signature Section</h3></td>
        </tr>
        <tr>
            <td colspan="2" style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Read and understood all of the above and I agree to all these terms and conditions</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Parent's First Name: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['agree_terms_conditions_parent_first_name'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Parent's Last Name: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['agree_terms_conditions_parent_last_name'] }}</td>
        </tr>
        <tr>
            <td colspan="2" style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Understand that any changes to the registration may be subject to the Course Change Fee as per the pricelist</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Parent's First Name: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['agree_changes_parent_first_name'] }}</td>
        </tr>
        <tr>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">Parent's Last Name: </td>
            <td style="line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8">{{ $data['agree_changes_parent_last_name'] }}</td>
        </tr>
    </tbody>
</table>