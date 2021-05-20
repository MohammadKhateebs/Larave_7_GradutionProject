@extends('admin')

@section('teachers')
    <div class="container py-md-5">

        <div class="float-md-right py-2">
        <button type="button"  type="button" class="btn btn-outline-dark py-5" data-bs-toggle="modal" data-bs-target="#addTeacher"><i class="fa fa-fw fa-user-plus"></i> {{ __('message.add teacher') }}</button>
              </div>

        <div class="modal  " id="addTeacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " >
                <div class="modal-content swiper-scrollbar-lock">

                    <div class="modal-header text-center bg-dark">
                        <h2 class="modal-title text-white w-100 font-weight-bold py-2"> {{__('message.add teacher')}}!</h2>

                    </div>
                    <div class="card-body  ">

                        <form id="add" >
                            {{ csrf_field() }}

                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <input type="text"  name="name" id="name" placeholder="{{__('message.name')}}" class="form-control "    >
                                    <span class="text-danger error-text name_err"></span>
                                </div>
                            </div>

                                <div class="form-group row  justify-content-center" >
                                    <div class="col-md-6">
                                        <input type="text" name="identification" id="identification" placeholder="{{__('message.Identification')}}" class="form-control "  >
                                        <span class="text-danger error-text identification_err"></span>
                                    </div>
                                </div>

                            <div class="form-group row justify-content-center">

                                <div class="col-md-6">
                                    <select id="studyLevel"  class="form-control" name="studyLevel" value="{{ old('studyLevel') }}">
                                        <option  disabled selected>{{__('message.Study Level')}}</option>
                                        <option value="الاول">الاول</option>
                                        <option value="الثاني">الثاني</option>
                                        <option value="الثالث">الثالث</option>
                                        <option value="الرابع">الرابع</option>
                                        <option value="الخامس">الخامس</option>
                                        <option value="السادس">السادس</option>

                                    </select>

                                </div>
                                <small class="text-danger error-text uniqueSL"></small>
                                <small class="text-danger error-text studyLevel_err"></small>
                            </div>

                                <div class="form-group row justify-content-center">

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control"  placeholder="{{ __('message.Password') }}" name="password" required >


                                    </div>
                                    <small class="text-danger error-text password_err" > </small>
                                </div>

                                <div class="form-group row justify-content-center" >

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('message.Confirm Password') }}" required autocomplete="new-password">
                                    </div>
                                </div>

                            <div class="modal-footer justify-content-center">
                                <button id="saveadd" class="btn btn-primary">{{__('message.add')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    <table class="table  table-striped table-hover" style="box-shadow: 5px 10px #888888;" >
        <thead class="bg-dark text-white">
        <tr>

            <th scope="col">{{__('message.name')}}</th>
            <th scope="col">{{__('message.Identification')}}</th>
            <th scope="col">{{__( 'message.Study Level')}}</th>
            <th scope="col">{{__('message.delete')}}</th>



        </tr>
        </thead>
        <tbody>

        @foreach ($Teachers   as $teacher)

            <tr>
                <td >{{$teacher->name}}</td>
                <td >{{$teacher->identification}}</td>
                <td>{{$teacher->studyLevel}}</td>

                <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#Modal2{{$teacher->identification}}"> <i class="fa fa-user-times"></i> {{__('message.delete')}}</button> </td>

            </tr>
            <!-- Modal2 -->
            <div class="modal fade" id="Modal2{{$teacher->identification}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header text-center bg-danger">
                            <h2 class="modal-title text-white w-100 font-weight-bold py-2">{{__('message.delete')}}!</h2>

                        </div>
                        <div class="modal-body ">
                            <div class="md-form mb-5 text-center">
                                <h3 class="modal-title text-break w-100 font-weight-bold py-2">هل تريد حذف هذا المدرس؟</h3>
                                <br>
                                <h5> {{ $teacher->identification }}:{{$teacher->name}}  </h5>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn  btn-outline-danger waves-effect" data-bs-dismiss="modal"><i class="fa fa-remove"></i></button>
                            <a class="btn  btn-outline-success waves-effect" href="{{url('deleteTeacher/'.$teacher->identification)}}"><i class="fa fa-check"></i></a>
                        </div>

                    </div>
                </div>
            </div>


        @endforeach
        </tbody>
    </table>
    </div>
@stop




<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script>
    $(document).on('click','#saveadd',function (e){
        e.preventDefault();

        var optionSelected2 = $('#studyLevel').find("option:selected");
        var studyLevel = optionSelected2.val();
        $('.name_err').text(" ");

        $('.identification_err').text(" ");

        $('.studyLevel_err').text(" ");
        $('.password_err').text(" ");
        $('.uniqueSL').text(" ");

        $.ajax({
            type:'post',
            url:"{{route('addteacher')}}",
            data:{
                '_token':$("input[name='_token']").val(),
                'name':$("input[name='name']").val(),

                'identification':$("input[name='identification']").val(),
                'password_confirmation':$("input[name='password_confirmation']").val(),
                'studyLevel':studyLevel,
                'password':$("input[name='password']").val(),
            },
            success: function(data) {
                if($.isEmptyObject(data.error)&&$.isEmptyObject(data.uniqueSL)){
                    location.reload();

                }else if(!$.isEmptyObject(data.error)){
                    printErrorMsg(data.error);
                } if(!$.isEmptyObject(data.uniqueSL)){
                    $('.uniqueSL').text(data.uniqueSL);
                }
            }
        });
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                console.log(key);
                $('.'+key+'_err').text(value);
            });
        }
    });



</script>

