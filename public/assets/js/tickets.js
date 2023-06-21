///////////////// handling and creating form of create ticket /////////////////////
var attachments = document.getElementById('attachments');
var rows = document.querySelectorAll('#attachments .form-row');
var len = 1;

var list = insertAddAttachBtn(rows[0]);
// list[1].addEventListener('click', handleAddAttachBtnClick);

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
    fileInput.setAttribute('wire:model', `files.${i-1}`);

    label.classList = 'floating-label';
    label.innerText = attachmentTitle;
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
    addAttachInput.value = attachmentAdd;
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
    $(ticketsCreate).fadeIn(500);
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
    $(ticketsAvailable).fadeIn(500);
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
    $(ticketsClosed).fadeIn(500);
}
