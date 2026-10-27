@extends('layouts.default')
@section('content')     
{{-- Display message --}}
<div class="col-md-12">
    <h2>
        <div class="col-md-7">
            Forms &nbsp;&nbsp;&nbsp;&nbsp;
        </div>  
    </h2>
</div><br>
<div class="col-sm-12">
    <table class="table table-striped table-hover" >
        <thead>
            <tr></tr>
            <tr>
                <th style="text-align:left;" scope="col">Category</th>
            </tr>
        </thead>
        <tbody>
            <tr><td style="text-align:left"><a href ="/admin/forms/announcement_file">Announcement Pdf Files</a></td></tr>
            <tr><td style="text-align:left"><a href ="/admin/forms/pre-enrollment">Pre-enrollment Agreement</a></td></tr>
            <tr><td style="text-align:left"><a href ="/admin/forms/application">Application and Enrollment Agreement</a></td></tr>
            <tr><td style="text-align:left"><a href ="/admin/forms/student_catalog">Student Catalog</a></td></tr>
            <tr><td style="text-align:left"><a href ="/admin/forms/performance_fact_sheet">Performance Fact Sheet</a></td></tr>
            <tr><td style="text-align:left"><a href ="/admin/forms/bppe_annual_report">BPPE Annual Report</a></td></tr>
            <tr><td style="text-align:left"><a href ="/admin/forms/tf_westwood">Transfer Form- Westwood campus</a></td></tr>
            <tr><td style="text-align:left"><a href ="/admin/forms/tf_hollywood">Transfer Form- Hollywood campus</a></td></tr>
            <tr><td style="text-align:left"><a href ="/admin/forms/survival_guide">Survival Guide</a></td></tr>
        </tbody>
    </table>
    {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $files->links() !!}
        </div>
</div>

@endsection