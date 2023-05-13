@extends('web.backend.layouts.app')
@section('title', 'SRESMIS | Grades')
@section('content')
<style>
    /* Choose all input elements that have the attribute: type="radio" and make them disappear.*/
input[type="radio"] {
  display:none;
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
input[type="radio"]:checked + label {
  background:#0d6efd;
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
                <div class="col-12 col-md-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card bg-primary p-2 text-center">
                                <span class="fs-5 text-light fw-bold span_text" id="composeMessage"><i
                                        class="bi bi-file-earmark-plus"></i> Compose</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card bg-primary p-2 text-center">
                                <span class="fs-5 text-light fw-bold span_text"><i class="bi bi-file-earmark-plus"></i>
                                    Folders</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card bg-primary p-2 text-center">
                                <span class="fs-5 text-light fw-bold span_text"><i class="bi bi-file-earmark-plus"></i>
                                    Labels</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="card h-100">
                        <div class="container">
                            <div class="row">
                                <span class="text-dark fs-5 m-2">Compose New Message</span>
                                <hr>
                                <div class="card-body">

                                    <input type="radio" id="principal" name="messageTo" class="messageTo" value="1" />
                                    <label for="principal">Principal</label>

                                    <input type="radio" id="teacher" name="messageTo" class="messageTo" value="2" />
                                    <label for="teacher">Teacher</label>

                                    <input type="radio" id="student" name="messageTo" class="messageTo" value="3" />
                                    <label for="student">Student</label>

                                

                                

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div><!-- End Recent Sales -->
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    @include('web.backend.teacher.mailbox.script')
@endsection
