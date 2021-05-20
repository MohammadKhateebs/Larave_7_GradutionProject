@extends('admin')
<style>
button i{
    display: block;
}
   .nav-link{
       display:block;
       padding:30px;
       height: 100px;
   }
.nav-link:hover{
  color: #1d68a7;
}
   .container{
       display: block;
       height: 100%; /* will cover the 100% of viewport */

   }
.d-flex{
    height: 100%;
}
div h3{
    text-align: center;
    background-color:black;
    color: white;
    height : 40px;
}
</style>
@section('Attendance')

        @if($role==4)
            <div>
                <h3>{{__('message.for students')}}</h3>
            </div>
        @elseif($role==3)
            <div>
                <h3>{{__('message.for volunteer')}}</h3></div>
        @endif
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link" id="first-tab" data-bs-toggle="pill" data-bs-target="#first" type="button" role="tab" aria-controls="first" aria-selected="false">{{__('message.First')}}</button>
                <button class="nav-link" id="second-tab" data-bs-toggle="pill" data-bs-target="#second" type="button" role="tab" aria-controls="second" aria-selected="false">{{__('message.Second')}}</button>
                <button class="nav-link" id="third-tab" data-bs-toggle="pill" data-bs-target="#third" type="button" role="tab" aria-controls="third" aria-selected="false">{{__('message.Third')}}</button>
                <button class="nav-link" id="fourth-tab" data-bs-toggle="pill" data-bs-target="#fourth" type="button" role="tab" aria-controls="fourth" aria-selected="false">{{__('message.Fourth')}}</button>
                <button class="nav-link" id="fifth-tab" data-bs-toggle="pill" data-bs-target="#fifth" type="button" role="tab" aria-controls="fifth" aria-selected="false">{{__('message.Fifth')}}</button>
                <button class="nav-link" id="sixth-tab" data-bs-toggle="pill" data-bs-target="#sixth" type="button" role="tab" aria-controls="sixth" aria-selected="false">{{__('message.Sixth')}}</button>


            </div>

                <div class="container shadow">
                    @if($role==4)
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade" id="first" role="tabpanel" aria-labelledby="first-tab">
                        {{--show student--}}
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($students as $student)
                                @if($student->studyLevel=='الاول'||$student->studyLevel=='First')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab{{$student->identification}}"data-bs-toggle="modal" data-bs-target="#exampleModal{{$student->identification}}" type="button" role="tab" aria-controls="pills-contact{{$student->identification}}" aria-selected="false">
                                            <i class="fa fa-user"></i><br>{{$student->firstName}} {{$student->secondName}} {{$student->lastName}}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="" id="">
                            @foreach($students as $student)
                                @if($student->studyLevel=='الاول' || $student->studyLevel=='First')
                                    <div class="modal fade" id="exampleModal{{$student->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-sm-center">
                                                    <h6  class="text-white"> {{$student->firstName}} {{$student->secondName}} {{$student->lastName}}
                                                    </h6>
                                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                                        <thead class="bg-dark text-white">
                                                        <tr>

                                                            <th scope="col"></th>
                                                            <th scope="col">{{__('message.date')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <p style="display: none">{{$i=1}}</p>
                                                        @foreach($absence as $a)
                                                            @if($student->identification==$a->identification)
                                                                <tr>
                                                                    <th scope="col">{{$i}}</th>
                                                                    <p style="display: none">{{$i+=1}}</p>
                                                                    <td>  <li>{{$a->date}}</li></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($students as $student)
                                @if($student->studyLevel=='الثاني' || $student->studyLevel=='Second')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab{{$student->identification}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$student->identification}}" type="button" role="tab" aria-controls="pills-contact{{$student->identification}}" aria-selected="false">
                                            <i class="fa fa-user"></i><br>{{$student->firstName}} {{$student->secondName}} {{$student->lastName}}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                                <div class="" id="">
                                    @foreach($students as $student)
                                        @if($student->studyLevel=='الثاني' || $student->studyLevel=='Second')
                                            <div class="modal fade" id="exampleModal{{$student->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-sm-center">
                                                            <h6  class="text-white"> {{$student->firstName}} {{$student->secondName}} {{$student->lastName}}
                                                            </h6>
                                                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                                                <thead class="bg-dark text-white">
                                                                <tr>

                                                                    <th scope="col"></th>
                                                                    <th scope="col">{{__('message.date')}}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <p style="display: none">{{$i=1}}</p>
                                                                @foreach($absence as $a)
                                                                    @if($student->identification==$a->identification)
                                                                        <tr>
                                                                            <th scope="col">{{$i}}</th>
                                                                            <p style="display: none">{{$i+=1}}</p>
                                                                            <td>  <li>{{$a->date}}</li></td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                                </tbody>
                                                            </table>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>





                                        @endif
                                    @endforeach
                                </div>

                    </div>
                    <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab"> <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($students as $student)
                                @if($student->studyLevel=='الثالث' || $student->studyLevel=='Third')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab{{$student->identification}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$student->identification}}" type="button" role="tab" aria-controls="pills-contact{{$student->identification}}" aria-selected="false">
                                            <i class="fa fa-user"></i><br>{{$student->firstName}}{{$student->secondName}} {{$student->lastName}}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="" id="">
                            @foreach($students as $student)
                                @if($student->studyLevel=='الثالث' || $student->studyLevel=='Third')
                                    <div class="modal fade" id="exampleModal{{$student->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-sm-center">
                                                    <h6  class="text-white"> {{$student->firstName}} {{$student->secondName}} {{$student->lastName}}
                                                    </h6>
                                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                                        <thead class="bg-dark text-white">
                                                        <tr>

                                                            <th scope="col"></th>
                                                            <th scope="col">{{__('message.date')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <p style="display: none">{{$i=1}}</p>
                                                        @foreach($absence as $a)
                                                            @if($student->identification==$a->identification)
                                                                <tr>
                                                                    <th scope="col">{{$i}}</th>
                                                                    <p style="display: none">{{$i+=1}}</p>
                                                                    <td>  <li>{{$a->date}}</li></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="fourth-tab"> <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($students as $student)
                                @if($student->studyLevel=='الرابع'||$student->studyLevel=='Fourth')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab{{$student->identification}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$student->identification}}" type="button" role="tab" aria-controls="pills-contact{{$student->identification}}" aria-selected="false">
                                            <i class="fa fa-user"></i><br>{{$student->firstName}} {{$student->secondName}} {{$student->lastName}}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="" id="">
                            @foreach($students as $student)
                                @if($student->studyLevel=='الرابع'||$student->studyLevel=='Fourth')
                                    <div class="modal fade" id="exampleModal{{$student->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-sm-center">
                                                    <h6  class="text-white"> {{$student->firstName}} {{$student->secondName}} {{$student->lastName}}
                                                    </h6>
                                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                                        <thead class="bg-dark text-white">
                                                        <tr>

                                                            <th scope="col"></th>
                                                            <th scope="col">{{__('message.date')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <p style="display: none">{{$i=1}}</p>
                                                        @foreach($absence as $a)
                                                            @if($student->identification==$a->identification)
                                                                <tr>
                                                                    <th scope="col">{{$i}}</th>
                                                                    <p style="display: none">{{$i+=1}}</p>
                                                                    <td>  <li>{{$a->date}}</li></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fifth" role="tabpanel" aria-labelledby="fifth-tab"> <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($students as $student)
                                @if($student->studyLevel=='الخامس'||$student->studyLevel=='Fifth')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab{{$student->identification}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$student->identification}}" type="button" role="tab" aria-controls="pills-contact{{$student->identification}}" aria-selected="false">
                                            <i class="fa fa-user"></i><br>{{$student->firstName}} {{$student->secondName}} {{$student->lastName}}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="" id="">
                            @foreach($students as $student)
                                @if($student->studyLevel=='الخامس'||$student->studyLevel=='Fifth')
                                    <div class="modal fade" id="exampleModal{{$student->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-sm-center">
                                                    <h6  class="text-white"> {{$student->firstName}} {{$student->secondName}} {{$student->lastName}}
                                                    </h6>
                                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                                        <thead class="bg-dark text-white">
                                                        <tr>

                                                            <th scope="col"></th>
                                                            <th scope="col">{{__('message.date')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <p style="display: none">{{$i=1}}</p>
                                                        @foreach($absence as $a)
                                                            @if($student->identification==$a->identification)
                                                                <tr>
                                                                    <th scope="col">{{$i}}</th>
                                                                    <p style="display: none">{{$i+=1}}</p>
                                                                    <td>  <li>{{$a->date}}</li></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sixth" role="tabpanel" aria-labelledby="sixth-tab"> <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($students as $student)
                                @if($student->studyLevel=='السادس'||$student->studyLevel=='Sixth')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab{{$student->identification}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$student->identification}}" type="button" role="tab" aria-controls="pills-contact{{$student->identification}}" aria-selected="false">
                                            <i class="fa fa-user"></i><br>{{$student->firstName}} {{$student->secondName}} {{$student->lastName}}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @foreach($students as $student)
                                @if($student->studyLevel=='السادس'||$student->studyLevel=='Sixth')
                                    <div class="modal fade" id="exampleModal{{$student->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-sm-center">
                                                    <h6  class="text-white"> {{$student->firstName}} {{$student->secondName}} {{$student->lastName}}
                                                    </h6>
                                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                                        <thead class="bg-dark text-white">
                                                        <tr>

                                                            <th scope="col"></th>
                                                            <th scope="col">{{__('message.date')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <p style="display: none">{{$i=1}}</p>
                                                        @foreach($absence as $a)
                                                            @if($student->identification==$a->identification)
                                                                <tr>
                                                                    <th scope="col">{{$i}}</th>
                                                                    <p style="display: none">{{$i+=1}}</p>
                                                                    <td>  <li>{{$a->date}}</li></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>


            @elseif($role==3)
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade" id="first" role="tabpanel" aria-labelledby="first-tab">
                        {{--show student--}}
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($volunteers as $volunteer)
                                @if($volunteer->studyLevel=='الاول'||$volunteer->studyLevel=='First')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab{{$volunteer->identification}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$volunteer->identification}}"
                                                type="button" role="tab" aria-controls="pills-contact{{$volunteer->identification}}" aria-selected="false">
                                    <i class="fa fa-user"></i><br>{{$volunteer->firstName}} {{$volunteer->secondName}} {{$volunteer->lastName}}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="" id="">
                            @foreach($volunteers as $volunteer)
                                @if($volunteer->studyLevel=='الاول' ||$volunteer->studyLevel=='First')
                                    <div class="modal fade" id="exampleModal{{$volunteer->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-sm-center">
                                                    <h6  class="text-white"> {{$volunteer->firstName}} {{$volunteer->secondName}} {{$volunteer->lastName}}
                                                    </h6>
                                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                                        <thead class="bg-dark text-white">
                                                        <tr>

                                                            <th scope="col"></th>
                                                            <th scope="col">{{__('message.date')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <p style="display: none">{{$i=1}}</p>
                                                        @foreach($absence as $a)
                                                            @if($volunteer->identification==$a->identification)
                                                                <tr>
                                                                    <th scope="col">{{$i}}</th>
                                                                    <p style="display: none">{{$i+=1}}</p>
                                                                    <td>  <li>{{$a->date}}</li></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>

                    <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($volunteers as $volunteer)
                                @if($volunteer->studyLevel=='الثاني' || $volunteer->studyLevel=='Second')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab{{$volunteer->identification}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$volunteer->identification}}"
                                                type="button" role="tab" aria-controls="pills-contact{{$volunteer->identification}}" aria-selected="false">
                                            <i class="fa fa-user"></i><br>{{$volunteer->firstName}} {{$volunteer->secondName}} {{$volunteer->lastName}}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @foreach($volunteers as $volunteer)
                                @if($volunteer->studyLevel=='الثاني'|| $volunteer->studyLevel=='Second')
                                    <div class="modal fade" id="exampleModal{{$volunteer->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-sm-center">
                                                    <h6  class="text-white"> {{$volunteer->firstName}} {{$volunteer->secondName}} {{$volunteer->lastName}}
                                                    </h6>
                                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                                        <thead class="bg-dark text-white">
                                                        <tr>

                                                            <th scope="col"></th>
                                                            <th scope="col">{{__('message.date')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <p style="display: none">{{$i=1}}</p>
                                                        @foreach($absence as $a)
                                                            @if($volunteer->identification==$a->identification)
                                                                <tr>
                                                                    <th scope="col">{{$i}}</th>
                                                                    <p style="display: none">{{$i+=1}}</p>
                                                                    <td>  <li>{{$a->date}}</li></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                    <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab"> <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($volunteers as $volunteer)
                                @if($volunteer->studyLevel=='الثالث'||$volunteer->studyLevel=='Third')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab{{$volunteer->identification}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$volunteer->identification}}"
                                                type="button" role="tab" aria-controls="pills-contact{{$volunteer->identification}}" aria-selected="false">
                                            <i class="fa fa-user"></i><br>{{$volunteer->firstName}} {{$volunteer->secondName}} {{$volunteer->lastName}}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="" id="">
                            @foreach($volunteers as $volunteer)
                                @if($volunteer->studyLevel=='الثالث'||$volunteer->studyLevel=='Third')
                                    <div class="modal fade" id="exampleModal{{$volunteer->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-sm-center">
                                                    <h6  class="text-white"> {{$volunteer->firstName}} {{$volunteer->secondName}} {{$volunteer->lastName}}
                                                    </h6>
                                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                                        <thead class="bg-dark text-white">
                                                        <tr>

                                                            <th scope="col"></th>
                                                            <th scope="col">{{__('message.date')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <p style="display: none">{{$i=1}}</p>
                                                        @foreach($absence as $a)
                                                            @if($volunteer->identification==$a->identification)
                                                                <tr>
                                                                    <th scope="col">{{$i}}</th>
                                                                    <p style="display: none">{{$i+=1}}</p>
                                                                    <td>  <li>{{$a->date}}</li></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="fourth-tab"> <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($volunteers as $volunteer)
                                @if($volunteer->studyLevel=='الرابع'||$volunteer->studyLevel=='Fourth')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab{{$volunteer->identification}}" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{$volunteer->identification}}" type="button" role="tab" aria-controls="pills-contact{{$volunteer->identification}}" aria-selected="false">
                                            <i class="fa fa-user"></i><br>{{$volunteer->firstName}} {{$volunteer->secondName}} {{$volunteer->lastName}}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="" id="">
                            @foreach($volunteers as $volunteer)
                                @if($volunteer->studyLevel=='الرابع'||$volunteer->studyLevel=='Fourth')
                                    <div class="modal fade" id="exampleModal{{$volunteer->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-sm-center">
                                                    <h6  class="text-white"> {{$volunteer->firstName}} {{$volunteer->secondName}} {{$volunteer->lastName}}
                                                    </h6>
                                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                                        <thead class="bg-dark text-white">
                                                        <tr>

                                                            <th scope="col"></th>
                                                            <th scope="col">{{__('message.date')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <p style="display: none">{{$i=1}}</p>
                                                        @foreach($absence as $a)
                                                            @if($volunteer->identification==$a->identification)
                                                                <tr>
                                                                    <th scope="col">{{$i}}</th>
                                                                    <p style="display: none">{{$i+=1}}</p>
                                                                    <td>  <li>{{$a->date}}</li></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fifth" role="tabpanel" aria-labelledby="fifth-tab"> <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($volunteers as $volunteer)
                                @if($volunteer->studyLevel=='الخامس' ||$volunteer->studyLevel=='Fifth')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab{{$volunteer->identification}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$volunteer->identification}}"
                                                type="button" role="tab" aria-controls="pills-contact{{$volunteer->identification}}" aria-selected="false">
                                            <i class="fa fa-user"></i>  {{$volunteer->firstName}} {{$volunteer->secondName}} {{$volunteer->lastName}}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="" id="">
                            @foreach($volunteers as $volunteer)
                                @if($volunteer->studyLevel=='الخامس' ||$volunteer->studyLevel=='Fifth')
                                    <div class="modal fade" id="exampleModal{{$volunteer->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-sm-center">
                                                    <h6  class="text-white"> {{$volunteer->firstName}} {{$volunteer->secondName}} {{$volunteer->lastName}}
                                                    </h6>
                                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                                        <thead class="bg-dark text-white">
                                                        <tr>

                                                            <th scope="col"></th>
                                                            <th scope="col">{{__('message.date')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <p style="display: none">{{$i=1}}</p>
                                                        @foreach($absence as $a)
                                                            @if($volunteer->identification==$a->identification)
                                                                <tr>
                                                                    <th scope="col">{{$i}}</th>
                                                                    <p style="display: none">{{$i+=1}}</p>
                                                                    <td>  <li>{{$a->date}}</li></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sixth" role="tabpanel" aria-labelledby="sixth-tab"> <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($volunteers as $volunteer)
                                @if($volunteer->studyLevel=='السادس' || $volunteer->studyLevel=='Sixth')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab{{$volunteer->identification}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$volunteer->identification}}"
                                                type="button" role="tab" aria-controls="pills-contact{{$volunteer->identification}}" aria-selected="false">
                                            <i class="fa fa-user"></i><br>{{$volunteer->firstName}} {{$volunteer->secondName}} {{$volunteer->lastName}}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @foreach($volunteers as $volunteer)
                                @if($volunteer->studyLevel=='السادس' || $volunteer->studyLevel=='Sixth')
                                    <div class="modal fade" id="exampleModal{{$volunteer->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-sm-center">
                                                    <h6  class="text-white"> {{$volunteer->firstName}} {{$volunteer->secondName}} {{$volunteer->lastName}}
                                                    </h6>
                                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;">
                                                        <thead class="bg-dark text-white">
                                                        <tr>

                                                            <th scope="col"></th>
                                                            <th scope="col">{{__('message.date')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <p style="display: none">{{$i=1}}</p>
                                                        @foreach($absence as $a)
                                                            @if($volunteer->identification==$a->identification)
                                                                <tr>
                                                                    <th scope="col">{{$i}}</th>
                                                                    <p style="display: none">{{$i+=1}}</p>
                                                                    <td>  <li>{{$a->date}}</li></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>


                </div>
            @endif
                </div>
        </div>

@stop



