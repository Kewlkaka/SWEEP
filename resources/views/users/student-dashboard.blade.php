<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/student-dashboard.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Zeyada&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bd1de80752.js" crossorigin="anonymous"></script>
</head>
<body>
   <x-base>
    <div class="studentmaincontainer">
        <div class="sidebar">
            <a href="#" ><h1><img src="{{ asset('assets/img/student-dashboard-profile-icon.png') }}" alt="">Profile</h1></a>
            <a href="#" ><h1><img src="{{ asset('assets/img/task-assignment-student-dashboard-icon.png') }}" alt="">Task History</h1></a>
            <a href="#" ><h1><img src="{{ asset('assets/img/search-people-student-dashboard-icon.png') }}" alt="">Notifications</h1></a>
            <a href="#" ><h1><img src="{{ asset('assets/img/friends-icon-student-dashboard.png') }}" alt="">Friends</h1></a>
            <a href="#" ><h1><img src="{{ asset('assets/img/chat-student-dashboard-icon.png') }}" alt="">Chat</h1></a>
        </div>
        <div class="studentdashboard" id="studentdashboard" >
            <div class="leftdashboard" >
                <div class="top">
                    <div class="infocontainer" id="infocontainer1" >
                        <h1>General Information<img src="{{ asset('assets/img/studentdashboard-general-info-logo.png') }}" alt="">
                        </h1>
                        <p>Name:{{$student['student_name']}}</p>
                        <p>Email:{{$student['student_email']}}</p>
                        <p>Gender:{{$student['student_gender']}}</p>
                        <p>Date of Birth:{{$student['student_dob']}}</p>
                        <p>Work Experience:{{$student['student_work_experience']}}</p>
                        <p>Program:{{$program['programs']}}</p>
                        <img src="{{ asset('assets/img/studentdashboard-arrow-icon.png') }}" data-target="infocontainer2"class="cardarrow" alt="">
                    </div>
                    
                    <div class="infocontainer"  id="infocontainer2"style="display: none;">
                        <h1>Academics<img src="{{ asset('assets/img/studentdashboard-general-info-logo.png') }}" alt="">
                        </h1>
                        <p>University Name: {{$student['student_university_name']}}</p>
                        <p>Degree: {{$levelofeducation['level_of_education']}}</p>
                        <p>Program: {{$program['programs']}}</p>
                        <p>Current Year: {{$student['student_current_year']}}</p>
                        <p>Country: {{$country['country']}}</p>
                        <img src="{{ asset('assets/img/studentdashboard-arrow-icon.png') }}" data-target="infocontainer1"class="cardarrow" alt="">
                    </div>
                </div>
                <div class="bottom">
                    <div class="sminfo">
                        <h1>Assignments</h1>
                            @php
                                $assignmentcount = 0;
                            @endphp
                            @foreach($sweephistories as $sweephistory)
                                @php
                                    $assignmentcount++;
                                @endphp
                            @endforeach
                        <h1>{{ $assignmentcount }}</h1>
                    </div>
                    <div class="sminfo">
                        <h1>Sweep Tokens</h1>
                            @php
                                $sumoftokens = 0;
                            @endphp
                            @foreach($sweephistories as $sweephistory)
                                @php
                                    $sumoftokens+=$sweephistory['sw_sweep_tokens'];
                                @endphp
                            @endforeach
                        <h1>{{$sumoftokens}}</h1>
                    </div>
                </div>
            </div>
            <div class="rightdashboard" >
                <div class="avatar">
                    @if($student['student_gender']=='F')
                    <img src="{{ asset('assets/img/3d-avator-women.png') }}" alt="">
                    @else
                    <img src="{{ asset('assets/img/3d-avatar_of_men.png') }}" alt="">
                    @endif
                    <h1>Welcome {{$student['student_name']}}</h1>
                </div>
            </div>

            <div id="taskhistory" style="display:none;">
                        <h1>Sweep Assignment List</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>Assignment Id</th>
                                    <th>Employee Name</th>
                                    <th>Student Name</th>
                                    <th>Sweep Tokens</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($sweephistories)
                                    @foreach($sweephistories as $sweephistory)
                                        <tr>
                                            <td>{{ $sweephistory['sw_sweep_assignment_id'] }}</td>
                                            <td>{{ $employeeNames[$sweephistory['sw_emp_id']] }}</td>
                                            <td>{{ $studentNames[$sweephistory['sw_student_id']] }}</td>
                                            <td>{{ $sweephistory['sw_sweep_tokens'] }}</td> 
                                            <td>{{ $sweephistory['sw_status'] }}</td>
                                            <td>
                                                @if($sweephistory['sw_status'] != 'complete')
                                                <button class="markAsDone" data-assignment-id="{{ $sweephistory['sw_sweep_assignment_id'] }}">Mark as Done</button>

                                                @else
                                                    Assignment Completed
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">No Assignments done</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <button id="close">Close</button>
            </div>
            
            <div id="notificationsdiv" style="display:none;">
                <h1>Sweep History List</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Assignment Id</th>
                            <th>Employee Name</th>
                            <th>Student Name</th>
                            <th>Sweep Tokens</th>
                            <th>Request Status</th> <!-- Add this column -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($sweephistories)
                            @foreach($sweephistories as $sweephistory)
                                <tr>
                                    <td>{{ $sweephistory['sw_sweep_assignment_id'] }}</td>
                                    <td>{{ $employeeNames[$sweephistory['sw_emp_id']] }}</td>
                                    <td>{{ $studentNames[$sweephistory['sw_student_id']] }}</td>
                                    <td>{{ $sweephistory['sw_sweep_tokens'] }}</td> 
                                    <td>{{ $sweephistory['sw_request_status'] }}</td> <!-- Add this column -->
                                    <td>
                                        @if($sweephistory['sw_request_status'] == 'pending')
                                            <button class="acceptRequest" data-assignment-id="{{ $sweephistory['id'] }}">Accept</button>
                                            <button class="rejectRequest" data-assignment-id="{{ $sweephistory['id'] }}">Reject</button>
                                        @else
                                            Request Already Responded
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">No Sweep Histories available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <button id="close1">Close</button> 
            </div>
           
        </div>
    </div>
    <script src="{{ asset('assets/js/student-dashboard.js') }}"></script>
    <script>
           
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('click', function (event) {
                if (event.target.classList.contains('markAsDone')) {
                   
                    const assignmentId = event.target.dataset.assignmentId;

                    // Send an AJAX request to mark the assignment as done
                    fetch('/mark-as-done', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({ assignment_id: assignmentId }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert('status is updated');
                        window.location.reload();
                        
                    })
                    .catch(error => console.error('Error:', error));
                }

                if (event.target.classList.contains('acceptRequest')) {
                    const assignmentId = event.target.dataset.assignmentId;
                    // Send an AJAX request to update the request status to 'accepted'
                    updateRequestStatus(assignmentId, 'accepted');
                    alert('status is updated');
                        window.location.reload();
                }

                if (event.target.classList.contains('rejectRequest')) {
                    const assignmentId = event.target.dataset.assignmentId;
                    // Send an AJAX request to update the request status to 'rejected'
                    updateRequestStatus(assignmentId, 'declined');
                    alert('status is updated');
                        window.location.reload();
                }
            });
            function updateRequestStatus(assignmentId, status) {
                fetch('/update-request-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({
                        assignment_id: assignmentId,
                        request_status: status,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    // You can update the UI or perform any other actions here
                })
                .catch(error => console.error('Error:', error));
            }
        });
    </script>
</x-base>
</body>