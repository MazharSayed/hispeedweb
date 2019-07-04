@extends('adminlte::page')



@section('title', 'Dashboard')

@section('content_header')

    <h1>Customer Details</h1>
 <div class="panel panel-default">
        <div class="panel-heading">
            Customer Details
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                       
                       
                         
                    <tr>
                            <th>Date Of Birth</th>
                            <td>{{$cust->dob}}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{$cust->gender}}</td>
                        </tr>
                        <tr>
                            <th>Reference Code</th>
                            <td>{{$cust->reference_code}}</td>
                        </tr>
                        <tr>
                            <th>Current Address</th>
                            <td>{{$cust->current_address}}</td>
                        </tr>
                        <tr>
                            <th>Permanent Address</th>
                            <td>{{$cust->permanent_address}}</td>
                        </tr>
                        <tr>
                            <th>Pin Code</th>
                            <td>{{$cust->pin_code}}</td>
                        </tr>
            <tr>
                            <th>Residence Type</th>
                            <td>{{$cust->vresidence_type}}</td>
                        </tr>
                        <tr>
                            <th>aadhar_number</th>
                            <td>{{$cust->aadhar_number}}</td>
                        </tr>
                        <tr>
                            <th>aadhar_photo</th>
                            <td>{{$cust->aadhar_photo}}</td>
                        </tr>
                        <tr>
                            <th>pan_number</th>
                            <td>{{$cust->pan_number}}</td>
                        </tr>
                        <tr>
                            <th>pan_photo</th>
                            <td>{{$cust->pan_photo}}</td>
                        </tr>
                        <tr>
                            <th>bank_passbook_photo</th>
                            <td>{{$cust->bank_passbook_photo}}</td>
                        </tr>
                        <tr>
                            <th>employment_type</th>
                            <td>{{$cust->employment_type}}</td>
                        </tr>
                        <tr>
                            <th>District</th>
                            <td>{{$cust->permenent_district}}</td>
                        </tr>
                        <tr>
                            <th>family_member_name</th>
                            <td>{{$cust->family_member_name}}</td>
                        </tr>
                        <tr>
                            <th>family_member_number</th>
                            <td>{{$cust->family_member_number}}</td>
                        </tr>
                        <tr>
                            <th>family_member_relation</th>
                            <td>{{$cust->family_member_relation}}</td>
                        </tr>
                        <tr>
                            <th>Guarantor Name</th>
                            <td>{{$cust->guarantor_name}}</td>
                        </tr>
                        <tr>
                            <th>guarantor_mobile_number</th>
                            <td>{{$cust->guarantor_mobile_number}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$cust->status}}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>{{$cust->image}}</td>
                        </tr>
                        
                    </table>

                </div>
                <div class="col-md-6">
                    <div class="panel-heading">
                        Documents
                     </div>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Adhar Card</th>
                            <td field-key='description'><a href="" target="_blank">Click Here to view</a></td>
                        </tr>
                        <tr>
                            <th>PAN</th>
                            <td field-key='description'><a href="" target="_blank">Click Here to view</a></td>
                        </tr>
                        <tr>
                            <th>Bank Reciept</th>
                            <td field-key='description'><a href="" target="_blank"><img src="" width="100"></a></td>
                        </tr>

                        
                        <tr>
                            <th>Image </th>
                            <td field-key='image'>
                                    <a href="" target="_blank"><img src="" style="width: 100px"/></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('cust.req') }}" class="btn btn-default">Back to List</a>
        </div>
    </div>
@stop