<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/student-dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Zeyada&display=swap" rel="stylesheet">
</head>
<x-base>
<body>
    <div id="cursorpointer"></div>
    <div class="studentdashboard" id="studentdashboard">
        <div class="leftdashboard">
            <div class="top">
                <div class="infocontainer" id="infocontainer1">
                    <h1>General Information<img src="{{ asset('assets/img/studentdashboard-general-info-logo.png') }}" alt="">
                    </h1>
                    <p>Name:{{$student['student_email']}}</p>
                    <p>Email:{{$student['student_email']}}</p>
                    <p>Gender:{{$student['student_gender']}}</p>
                    <p>Date of Birth:{{$student['student_dob']}}</p>
                    <p>Work Experience:{{$student['student_word_experience']}}</p>
                    <p>program:{{$program['programs']}}</p>
                    <img src="{{ asset('assets/img/studentdashboard-arrow-icon.png') }}" data-target="infocontainer2"class="cardarrow" alt="">
                </div>
                <div class="infocontainer"  id="infocontainer2"style="display: none;">
                    <h1>Sweep Assignment<img src="{{ asset('assets/img/studentdashboard-general-info-logo.png') }}" alt="">
                    </h1>
                    <p>Title:</p>
                    <p>Program:</p>
                    <p>Status:</p>
                    <p>Compensation:</p>
                    <p>Sweep tokens:</p>
                    <img src="{{ asset('assets/img/studentdashboard-arrow-icon.png') }}" data-target="infocontainer3"class="cardarrow" alt="">
                </div>
                <div class="infocontainer"  id="infocontainer3"style="display: none;">
                    <h1>Academics<img src="{{ asset('assets/img/studentdashboard-general-info-logo.png') }}" alt="">
                    </h1>
                    <p>University Name</p>
                    <p>Degree</p>
                    <p>Department</p>
                    <p>Program</p>
                    <p>Current Year</p>
                    <img src="{{ asset('assets/img/studentdashboard-arrow-icon.png') }}" data-target="infocontainer1"class="cardarrow" alt="">
                </div>
            </div>
            <div class="bottom">
                <div class="sminfo">
                    <h1>Assignments</h1>
                    <h1>0</h1>
                </div>
                <div class="sminfo">
                    <h1>Sweep Tokens</h1>
                    <h1>0</h1>
                </div>
            </div>
        </div>
        <!-- <div class="linebtw"></div> -->
        <div class="rightdashboard">
            <div class="avatar">
                @if($student['student_gender']=='F')

                <img src="{{ asset('assets/img/3d-avator-women.png') }}" alt="">
                @else
                <img src="{{ asset('assets/img/3d-avatar_of_men.png') }}" alt="">
                @endif
                <h1>Welcome {{$student['student_name']}}</h1>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/student-dashboard.js') }}"></script>
</body>
</x-base>