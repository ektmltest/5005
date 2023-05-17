@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.ticket')))

@section('content')
@component('layouts.components.rtl-links-css')
@endcomponent

@include('layouts.header', [
'header' => true,
'header_head' => ucwords(__('headers.ticket.header')),
'header_body' => __('headers.ticket.body'),
])

<!-- Start Faqs -->
<section id="faqs-pp" class="faqs-pp">
    <div class="container">
        <div class="row">
            <!-- Start Faq Sidebar -->
            <div class="col-xl-3 col-lg-4">
                <aside class="aside-bar">
                    <div class="faq-control">
                        <ul class="list-unstyled">
                            <li class="active"><a id="ticketsCreateLink" style="cursor: pointer"><i class='bx bx-message-rounded-add'></i>{{ucwords(__('tickets_trans.create_ticket'))}}</a></li>
                            <li><a id="ticketsAvailableLink" style="cursor: pointer"><i class="bx bx-list-ul"></i>{{ucwords(__('tickets_trans.available_ticket'))}}</a></li>
                            <li><a id="ticketsClosedLink" style="cursor: pointer"><i class="bx bx-lock"></i>{{ucwords(__('tickets_trans.closed_ticket'))}}</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
            <!-- End Faq Sidebar -->

            <div class="col-xl-9 col-lg-8">
                <div id="boxData">
                    <form id="ticketsCreate" class="faq-control p-3">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="floating-label-wrap">
                                    <input type="text" class="floating-label-field floating-label-field--s3" id="subject" name="subject" placeholder="title">
                                    <label for="subject" class="floating-label">title</label>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="floating-label-wrap">
                                    <select class="floating-label-field floating-label-field--s3" id="subject" name="subject">
                                        <option value="">test</option>
                                        <option value="">test</option>
                                        <option value="">test</option>
                                    </select>
                                    <label for="subject" class="floating-label">title</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <div class="floating-label-wrap">
                                    <textarea class="floating-label-field floating-label-field--s3" id="subject" name="subject" placeholder="title" rows="10"></textarea>
                                    <label for="subject" class="floating-label">title</label>
                                </div>
                            </div>
                        </div>

                        <div id="attachments">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <div class="floating-label-wrap">
                                        <input type="file" class="floating-label-field floating-label-field--s3" id="attachInput" name="attachments[]" />
                                        <label for="attachInput" class="floating-label">attachments</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="form-group col">
                                <div class="floating-label-wrap">
                                    <div class="form-buttons d-inline-block">
                                        <input type="submit" value="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="ticketsAvailable" class="d-none faq-control p-3">
                        <a href="{{route('tickets.show')}}" class="job-post shadow-none">
                            <div class="row">
                                <div class="col-xl-5 col-lg-5">
                                    <div class="job-title">
                                        <h5>Email Sender - TEST</h5>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4">
                                    <div class="job-category">
                                        <span>إستفسار</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="job-location">
                                        <i class="bx bx-time"></i>
                                        <span>2023-05-16 09:27:16</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        {{-- <p class="text-center font-weight-bold" style="color: #4b3da7;">No Available tickets</p> --}}
                    </div>

                    <div id="ticketsClosed" class="d-none faq-control p-3">
                        <a href="{{route('tickets.show')}}" class="job-post shadow-none">
                            <div class="row">
                                <div class="col-xl-5 col-lg-5">
                                    <div class="job-title">
                                        <h5>Email Sender - TEST</h5>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4">
                                    <div class="job-category">
                                        <span>إستفسار</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="job-location">
                                        <i class="bx bx-time"></i>
                                        <span>2023-05-16 09:27:16</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        {{-- <p class="text-center font-weight-bold" style="color: #4b3da7;">No Available closed tickets</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Faqs -->

<script type="application/javascript">
///////////////// handling and creating form of create ticket /////////////////////
var attachments = document.getElementById('attachments');
var rows = document.querySelectorAll('#attachments .form-row');
var len = 1;

var list = insertAddAttachBtn(rows[0]);
list[1].addEventListener('click', handleAddAttachBtnClick);

function insertFormFileInput(row, i) {
    var inputDiv = document.createElement('div');
    var btnWrapDiv = document.createElement('div');
    var fileInput = document.createElement('input');
    var label = document.createElement('label');

    inputDiv.classList = 'form-group col-md-8';

    btnWrapDiv.classList = 'floating-label-wrap';

    fileInput.classList = 'floating-label-field floating-label-field--s3';
    fileInput.type = 'file';
    fileInput.id = `attachInput${i}`;
    fileInput.name = 'attachments[]';

    label.classList = 'floating-label';
    label.innerText = 'attachments';
    label.htmlFor = `attachInput${i}`;

    btnWrapDiv.appendChild(fileInput);
    btnWrapDiv.appendChild(label);
    inputDiv.appendChild(btnWrapDiv);
    row.appendChild(inputDiv);

    return inputDiv;
}

function insertAddAttachBtn(row) {
    var btnDiv = document.createElement('div');
    var btnWrapDiv = document.createElement('div');
    var btnWrapFormBtnsDiv = document.createElement('div');
    var addAttachInput = document.createElement('input');

    btnDiv.classList = 'form-group col-md-4';
    btnWrapDiv.classList = 'floating-label-wrap';
    btnWrapFormBtnsDiv.classList = 'form-buttons';

    addAttachInput.type = 'button';
    addAttachInput.value = 'add attachment';
    addAttachInput.id = 'addAttachBtn';

    btnWrapFormBtnsDiv.appendChild(addAttachInput);
    btnWrapDiv.appendChild(btnWrapFormBtnsDiv);
    btnDiv.appendChild(btnWrapDiv);

    row.appendChild(btnDiv);

    return [btnDiv, addAttachInput];
}

function handleAddAttachBtnClick(e) {
    var btnDiv = list[0];
    var row = document.createElement('div');

    btnDiv.remove();

    row.classList = 'form-row';
    insertFormFileInput(row, ++len);
    list = insertAddAttachBtn(row);

    list[1].addEventListener('click', handleAddAttachBtnClick);

    attachments.appendChild(row);
}
///////////////// end => handling and creating form of create ticket /////////////////////

///////////////// handling tabs /////////////////////
var ticketsCreateLink = document.getElementById('ticketsCreateLink');
var ticketsAvailableLink = document.getElementById('ticketsAvailableLink');
var ticketsClosedLink = document.getElementById('ticketsClosedLink');

ticketsCreateLink.addEventListener('click', handleCreateLinkClick);

ticketsAvailableLink.addEventListener('click', handleAvailableLinkClick);

ticketsClosedLink.addEventListener('click', handleClosedLinkClick);

function handleCreateLinkClick() {
    var ticketsCreate = document.getElementById('ticketsCreate');
    var ticketsAvailable = document.getElementById('ticketsAvailable');
    var ticketsClosed = document.getElementById('ticketsClosed');

    [].slice.call(ticketsCreateLink.parentElement.parentElement.children).forEach(elem => {
        if(elem.classList.contains('active'))
            elem.classList.remove('active');
    });

    ticketsCreateLink.parentElement.classList = 'active';

    // ticketsCreate.classList.remove('d-none');
    // ticketsAvailable.classList.add('d-none');
    // ticketsClosed.classList.add('d-none');
    ticketsAvailable.classList.remove('d-none');
    ticketsClosed.classList.remove('d-none');
    $(ticketsAvailable).hide();
    $(ticketsClosed).hide();
    $(ticketsCreate).hide();
    $(ticketsCreate).fadeIn(1000);
}

function handleAvailableLinkClick() {
    var ticketsCreate = document.getElementById('ticketsCreate');
    var ticketsAvailable = document.getElementById('ticketsAvailable');
    var ticketsClosed = document.getElementById('ticketsClosed');

    [].slice.call(ticketsAvailableLink.parentElement.parentElement.children).forEach(elem => {
        if(elem.classList.contains('active'))
            elem.classList.remove('active');
    });

    ticketsAvailableLink.parentElement.classList = 'active';

    // ticketsCreate.classList.add('d-none');
    // ticketsAvailable.classList.remove('d-none');
    // ticketsClosed.classList.add('d-none');
    ticketsAvailable.classList.remove('d-none');
    ticketsClosed.classList.remove('d-none');
    $(ticketsClosed).hide();
    $(ticketsCreate).hide();
    $(ticketsAvailable).hide();
    $(ticketsAvailable).fadeIn(1000);
}

function handleClosedLinkClick() {
    var ticketsCreate = document.getElementById('ticketsCreate');
    var ticketsAvailable = document.getElementById('ticketsAvailable');
    var ticketsClosed = document.getElementById('ticketsClosed');

    [].slice.call(ticketsClosedLink.parentElement.parentElement.children).forEach(elem => {
        if(elem.classList.contains('active'))
            elem.classList.remove('active');
    });

    ticketsClosedLink.parentElement.classList = 'active';

    // ticketsCreate.classList.add('d-none');
    // ticketsAvailable.classList.add('d-none');
    // ticketsClosed.classList.remove('d-none');
    ticketsAvailable.classList.remove('d-none');
    ticketsClosed.classList.remove('d-none');
    $(ticketsCreate).hide();
    $(ticketsAvailable).hide();
    $(ticketsClosed).hide();
    $(ticketsClosed).fadeIn(1000);
}


</script>

@component('layouts.components.rtl-links-js')
@endcomponent

@endsection
