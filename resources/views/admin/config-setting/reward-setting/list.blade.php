@extends('admin.layouts.app')

@section('title', 'Reward setting')

@section('breadcrumb')
<div class="page-header">
    <h3 class="page-title"> Reward setting</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.settings.reward.list') }}">Reward setting</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reward setting</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between" style="padding-bottom: 16px;">
                        <h4 class="card-title"><u>Reward setting</u></h4>
                        <a href="{{route('admin.settings.reward.add')}}"><button type="button" class="btn default-btn btn-md" >
                            <span class="menu-icon">+ Add Reward</span></button></a>
                    </div>
                
                    <x-alert />
                    <div class="table-responsive">
                        <table class="table table-striped" id="filterData">
                          <thead>
                            <tr>
                              <th> Reward Id </th>
                              <th> User Type </th>
                              <th> Name </th>
                              <th> Created at </th>
                              <th> Action </th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($rewards as $reward)
                              <tr>
                                <td>#{{ $loop->iteration }}</td>
                                <?php $userType = $reward->user_type == 1 ? 'Customer' : 'Driver';?>
                                <td style="width: 300px" class="vehicle-modal"> {{$userType}}</td>
                                <td style="width: 300px" class="vehicle-modal"> {{$reward->reward_name }}</td>
                                <td style="width: 300px" class="vehicle-modal">{{$reward->created_at->format('Y-m-d')}}</td>
                                <td> 
                                  <span class="menu-icon">
                                    <a href="#" title="View" data-toggle="modal" data-target="#viewReward{{$reward->id}}" class="text-primary"><i class="mdi mdi-eye"></i></a>
                                  </span>&nbsp;&nbsp;&nbsp;
                                  <span class="menu-icon">
                                    <a href="{{route('admin.settings.reward.edit',['id' => $reward->id])}}" title="Edit" class="text-success"><i class="mdi mdi-pencil"></i></a>
                                  </span>&nbsp;&nbsp;
                                  <span class="menu-icon">
                                    <a href="#" title="Delete" class="text-danger deleteReward" data-id="{{$reward->id}}"><i class="mdi mdi-delete"></i></a>
                                  </span> 
                                </td>
                              </tr>

                              <!-- Modal -->
                                <div class="modal fade" id="viewReward{{$reward->id}}" tabindex="-1" aria-labelledby="viewRewardLabel{{$reward->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title fs-5" id="viewRewardLabel{{ $reward->id }}">View Reward</h4>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="view-form">
                                                <input type="hidden" name="user_type" id="user_type_{{ $reward->id }}" value="{{ $reward->user_type }}">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="exampleInputUserType">User Type</label>
                                                            @php
                                                                $userTypeText = $reward->user_type == 1 ? 'Customer' : 'Driver';
                                                            @endphp
                                                            <input type="text" class="form-control" value="{{ $userTypeText }}" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleInputName">Reward Name</label>
                                                            <input type="text" class="form-control"  id="exampleInputName" placeholder="Enter Reward Name" @if(!empty($reward)) value="{{ old('reward_name', $reward->reward_name) }}" @endif disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="driver-fields-{{$reward->id}}" style="display: none;">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="exampleInputRides">Driver Completed Rides</label>
                                                                <input type="number" min="0" class="form-control" id="exampleInputRides" placeholder="Enter Number of Completed Rides" @if(!empty($reward)) value="{{ old('driver_completed_rides', $reward->driver_completed_rides) }}" @endif disabled>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="exampleInputDriverReward">Driver Reward Points</label>
                                                                <input type="number" min="0" class="form-control" id="exampleInputDriverReward" placeholder="Enter Driver Reward Points" @if(!empty($reward)) value="{{ old('driver_reward_points', $reward->driver_reward_points) }}" @endif disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <div id="user-fields-{{$reward->id}}" style="display: none;">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="exampleInputUserRides">User Completed Rides</label>
                                                                <input type="number" min="0" class="form-control" id="exampleInputUserRides" placeholder="Enter Number of Completed Rides" @if(!empty($reward)) value="{{ old('user_completed_rides', $reward->user_completed_rides) }}" @endif disabled>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="exampleInputUserReward">User Reward Points</label>
                                                                <input type="number" min="0" class="form-control" id="exampleInputUserReward" placeholder="Enter User Reward Points" @if(!empty($reward)) value="{{ old('user_reward_points', $reward->user_reward_points) }}" @endif disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @empty
                            <tr>
                                <td colspan="6" class="no-record"> <center>No record found </center></td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/23.3.2/js/intlTelInput.min.js"></script>
<script>
    $('.deleteReward').on('click', function() {
    var reward_id = $(this).attr('data-id');
      Swal.fire({
          title: "Are you sure?",
          text: "You want to delete the Reward?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#2ea57c",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  url: "/admin/settings/rewards/delete/" + reward_id,
                  type: "GET", 
                  success: function(response) {
                    if (response.status == "success") {
                      toastr.success(response.message);
                        //$('table.table-striped tr#+'{$user_id}).remove();
                         setTimeout(function() {
                            location.reload();
                         }, 2000);
                      } else {
                        toastr.error(response.message);
                      }
                  }
              });
          }
      });
    });

    $(document).ready(function() {
        $("#edit-user").validate({
            rules: {
                driver_completed_rides: {
                    required: true,
                    number: true,
                    noSpace: true,
                },
                driver_reward_points: {
                    required: true,
                    number: true,
                    noSpace: true,
                },
                user_completed_rides: {
                    required: true,
                    number: true,
                    noSpace: true,
                },
                user_reward_points: {
                    required: true,
                    number: true,
                    noSpace: true,
                },
                total_reward_points: {
                    required: true,
                    number: true,
                    noSpace: true,
                },
                driver_point_value: {
                    required:true,
                    number:true,
                    noSpace:true,
                },
                user_point_value: {
                    required:true,
                    number:true,
                    noSpace:true,
                }
            },
            messages: {
                driver_completed_rides: {
                    required: "Number of Rides Completed by driver is required",
                    number: "Please enter a valid number",
                },
                driver_reward_points: {
                    required: "Driver Reward Points is required",
                    number: "Please enter a valid number",
                },
                user_completed_rides: {
                    required: "Number of Rides booked by user is required",
                    number: "Please enter a valid number",
                },
                user_reward_points: {
                    required: "User Reward Points is required",
                    number: "Please enter a valid number",
                }
             },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                if (element.attr("type") == "file") {
                    error.insertAfter(element.next());
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // Custom method to check for spaces
        $.validator.addMethod("noSpace", function(value, element) {
            return value.trim().length !== 0;
        }, "Spaces are not allowed");

        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            initialCountry: 'au', // Default country
            separateDialCode: true,
            utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js', // Path to utils.js    
        });

        // Update flag icon based on selected country
        $('#phone').on('countrychange', function() {
            var countryCode = $('.iti__selected-dial-code').html();
            $('#country_code').val(countryCode);
        });

    });

    document.addEventListener('DOMContentLoaded', function () {
        @foreach($rewards as $reward)
            const userType{{ $reward->id }} = document.getElementById('user_type_{{ $reward->id }}')?.value;
            const driverFields{{ $reward->id }} = document.getElementById('driver-fields-{{ $reward->id }}');
            const userFields{{ $reward->id }} = document.getElementById('user-fields-{{ $reward->id }}');

            if (userType{{ $reward->id }} === "2") {
                if (driverFields{{ $reward->id }}) driverFields{{ $reward->id }}.style.display = 'block';
                if (userFields{{ $reward->id }}) userFields{{ $reward->id }}.style.display = 'none';
            } else if (userType{{ $reward->id }} === "1") {
                if (userFields{{ $reward->id }}) userFields{{ $reward->id }}.style.display = 'block';
                if (driverFields{{ $reward->id }}) driverFields{{ $reward->id }}.style.display = 'none';
            }
        @endforeach
    });

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('profilePreview');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
