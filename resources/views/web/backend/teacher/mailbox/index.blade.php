@extends('web.backend.layouts.app')
@section('title', 'SRESMIS | Grades')
@section('content')
    <style>
        /* Choose all input elements that have the attribute: type="radio" and make them disappear.*/
        input[type="radio"] {
            display: none;
        }

        /* The label is what's left to style.
                                                            As long as its 'for' attribute matches the input's 'id', it will maintain the function of a radio button. */
        label {
            padding: .7em;
            display: inline-block;
            border: 1px solid grey;
            cursor: pointer;
        }

        .blank-label {
            display: none;
        }

        /* The '+' is the adjacent sibling selector.
                                                            It selects what ever element comes right after it,
                                                            as long as it is a sibling. */
        input[type="radio"]:checked+label {
            background: #0d6efd;
            color: #fff;
        }
    </style>
    <main id="main" class="main">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-chat-left-dots"></i> Mailbox </h5>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark"><i
                                        class="bi bi-house-door"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="">Mailbox</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-2 gx-0">
                    <div class="card rounded-0">
                        <div class="card-body py-2">

                            <!-- Vertical Pills Tabs -->
                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <button class="nav-link active rounded-0" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home" type="button" role="tab"
                                        aria-controls="v-pills-home" aria-selected="true">Compose</button>
                                    <button class="nav-link rounded-0" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-profile" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="false">Inbox</button>
                                    <button class="nav-link rounded-0 fetchMessage" id="v-pills-messages-tab"
                                        data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button"
                                        role="tab" aria-controls="v-pills-messages" aria-selected="false">Sent</button>
                                </div>
                                {{-- remove here --}}
                            </div>
                            <!-- End Vertical Pills Tabs -->

                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active p-2" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="container">
                                        <div class="row">
                                            <span class="text-dark fs-5 m-2">Compose New Message</span>
                                            <hr>
                                            <div class="card-body">
                                                <div class="messageTOUser mb-3">
                                                    <input type="radio" id="principal" name="messageTo" class="messageTo"
                                                        value="1" />
                                                    <label for="principal">Principal</label>

                                                    <input type="radio" id="teacher" name="messageTo" class="messageTo"
                                                        value="2" />
                                                    <label for="teacher">Teacher</label>

                                                    <input type="radio" id="student" name="messageTo" class="messageTo"
                                                        value="3" />
                                                    <label for="student">Student</label>
                                                </div>

                                                <div class="mb-3">
                                                    <select name="sendTo[]" class="form-control sentTouser" id=""
                                                        multiple>
                                                        <option disabled selected>To:</option>
                                                    </select>

                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" name="subjectContent" class="form-control"
                                                        id="" placeholder="Subject:">

                                                </div>
                                                <div class="mb-3">
                                                    <textarea placeholder="Type here..." name="messageContent" id="editor" cols="30" rows="10">
                                                  
                                                  </textarea>
                                                </div>
                                                <div class="mb-3">

                                                </div>

                                                <div class="mb-3 text-end">
                                                    <button type="button"
                                                        class="btn btn-primary rounded-0 submitMessage "><i
                                                            class="bi bi-send"></i>
                                                        Send</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade p-2" id="v-pills-profile" role="tabpanel">
                                    <div class="container">
                                        <div class="row">

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade p-2" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <div class="container">
                                        <div class="row">
                                            <ul class="fetchMessageHere">
                                              
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>









    </main>
@endsection
@section('scripts')
    @include('web.backend.teacher.mailbox.script')
@endsection
