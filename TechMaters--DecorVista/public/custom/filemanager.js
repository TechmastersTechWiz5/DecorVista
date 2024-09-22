
let appurl = $('meta[name="file-base-url"]').attr("content");
const filebase = $('meta[name="file-base-url"]').attr("content");
const urlApp = $('meta[name="app-url"]').attr("content");
let currentField = null;
let multipleImage = false;
let selectedFiles = false;
$('.custome-filemanager').click(function(e) {
    e.preventDefault();
    currentField = $(this).find('.selected-files');
    let dataType = $(this).data('type')  == 'undefined' ||  $(this).data('type')  == null  ? 'all' :$(this).data('type') ;
    multipleImage = $(this).data('multiple')  == 'undefined' ||  $(this).data('multiple')  == null  ? false : true ;
    let inputName = $(this).find('.selected-files').attr('name');
    let inputFiles = $(this).find('.selected-files').val() ?? null;
    console.log(inputFiles,'inputFiles');
    $('input[name="inputfielddata"]').val(inputName);
    $('input[name="filedataType"]').val(dataType);
    $('#exampleModalLarge01').modal('show');
    $('input[name="filemanaerselectedfiles"]').val(inputFiles)
    fetchImages(1, null, inputName, inputFiles,this);

    let inputFilesArray = inputFiles !== '' && inputFiles !== null ? inputFiles.split(',') : [];
    let selectedfilemsg = inputFilesArray.length> 0 ?`<p>${inputFilesArray.length} Files Selected <span style="text-primary"><a href="javascript:void(0)" onclick="filemanagerclearselection()">Clear Selection</a></span></p>`:`0 Files Selected`;
    $('.no_ofselectedfiles').html(selectedfilemsg);
});

const customFilemanager = (file)=>{

    currentField = $(file).find('.selected-files');
    let dataType = $(file).data('type')  == 'undefined' ||  $(file).data('type')  == null  ? 'all' :$(file).data('type') ;
    multipleImage = $(file).data('multiple')  == 'undefined' ||  $(file).data('multiple')  == null  ? false : true ;
    let inputName = $(file).find('.selected-files').attr('name');
    let inputFiles = $(file).find('.selected-files').val() ?? null;
    $('input[name="inputfielddata"]').val(inputName);
    $('input[name="filedataType"]').val(dataType);
    $('#exampleModalLarge01').modal('show');
    $('input[name="filemanaerselectedfiles"]').val(inputFiles)
    fetchImages(1, null, inputName, inputFiles,this);

    let inputFilesArray = inputFiles !== '' && inputFiles !== null ? inputFiles.split(',') : [];
    let selectedfilemsg = inputFilesArray.length> 0 ?`<p>${inputFilesArray.length} Files Selected <span style="text-primary"><a href="javascript:void(0)" onclick="filemanagerclearselection()">Clear Selection</a></span></p>`:`0 Files Selected`;
    $('.no_ofselectedfiles').html(selectedfilemsg);
}

const swithtabselectfile = () => {
    let inputfielddata = $('input[name="inputfielddata"]').val()
    // let selectedData = $('input[name="' + inputfielddata + '"]').val();
    let selectedData = $(currentField).val();
    let searchval = $('input[name="search"]').val();
    fetchImages(1, searchval, null, selectedData);
}

function fetchImages(page, val = null, inputname = null, inputFiles = null) {
    $('#images-container').append(`
        <div style="display:flex;justify-content:center">
        <span class="spinner-border spinner-border-sm"></span>&nbsp; Processing...</div>
    `);
    let dataType = $('input[name="filedataType"]').val();

    $.ajax({
        url: `${urlApp}filemanager/getfiles?page=${page}`,
        type: 'GET',
        data: {
            search: val,
            dataType:dataType
        },
        success: function(data) {
            $('#images-container').empty();
            $('#pagination-links').empty();
            let inputFilesArray = [];
            if (inputFiles != null) {
                inputFilesArray = inputFiles.split(',');
            }
            $.each(data.data, function(index, image) {
                const filename = image.file_original_name.substring(0, 7);
                const fileuniqueimg = image.file_name;

                let activeSelectedFile = '';
                if (inputFilesArray.length > 0) {
                    if (inputFilesArray.includes(fileuniqueimg)) {
                        activeSelectedFile = 'selected-image';
                    }
                }
                let viewfile='';
                if(image.type == 'image'){
                    viewfile = `<img height="100" style="object-fit:cover;" src="${image.uploaded_image}"
                    alt="">`;
                }else if(image.type== 'video'){
                    viewfile=`<div class="card-body fmapp-info-trigger"><span class="feather-icon filemanager-documnet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></span></div>`;
                }else{
                    viewfile = `<div class="card-body fmapp-info-trigger">
                        <i class="ri-file-pdf-fill text-danger filemanager-documnet"></i>
                    </div>`;
                }

                $('#images-container').append(
                    `<div class="col-sm-2">
                        <div class="card card-border ${activeSelectedFile}" style="cursor:pointer;height:155px" data-inputname="${inputname}" data-image="${fileuniqueimg}" onclick="selectImage(this)">
                            ${viewfile}
                            <div class="card-footer filemanager-card-footer">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="file-name">${filename}..</div>
                                        <div class="text-truncate fs-8 mb-2">${image.uploaded_image_size}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
                );
            });

            if (data.prev_page_url != null) {
                const prev_page_url = data.prev_page_url;
                const prev_pageParam = new URLSearchParams(new URL(prev_page_url).search);
                const prevPageParamNumber = prev_pageParam.get("page");
                $('#pagination-links').append(`
                    <button type="button" data-page="${prevPageParamNumber}" title="Previous Page" aria-pressed="false" class="fc-prev-button btn btn-primary btn-icon btn-flush-dark btn-rounded flush-soft-hover prev-page">
                        <span class="fa fa-chevron-left icon"></span>
                    </button>
                `);
            }
            if (data.next_page_url != null) {
                const nextPage = data.next_page_url;
                const nextPageParam = new URLSearchParams(new URL(nextPage).search);
                const nextPageParamNumber = nextPageParam.get("page");
                $('#pagination-links').append(
                    `<button type="button" data-page="${nextPageParamNumber}" title="Next Page" aria-pressed="false" class="fc-next-button btn btn-primary btn-icon btn-flush-dark btn-rounded flush-soft-hover next-page">
                        <span class="fa fa-chevron-right icon"></span>
                    </button>
                `);

            }
        }
    });
}


const selectImage = (imagebox) => {
    let filePatch = $(imagebox).data('image');
    let filemanaerselectedfiles = $('input[name="filemanaerselectedfiles"]').val()
    let filemanaerselectedfilesArray = [];
    if (filemanaerselectedfiles != '') {
        filemanaerselectedfilesArray = filemanaerselectedfiles.split(',');
    }

    let allSelectedFiles = $('.selected-image');
    // console.log($('.selected-image'),'selected file',$('.selected-image').length);
    if (!multipleImage) {
        allSelectedFiles.map((element,index)=>{
            $(allSelectedFiles).removeClass('selected-image')
        })
    }

    if ($(imagebox).hasClass('selected-image')) {
        $(imagebox).removeClass('selected-image')
        filemanaerselectedfilesArray.map((e, i) => {
            if (e == filePatch) {
                let index = filemanaerselectedfilesArray.indexOf(filePatch);
                if (index !== -1) {
                    filemanaerselectedfilesArray.splice(index, 1);
                }
            }
        })
        let seperatedImages = filemanaerselectedfilesArray.join();
        $('input[name="filemanaerselectedfiles"]').val(seperatedImages)

    } else {
        $(imagebox).addClass('selected-image')
        if (!filemanaerselectedfilesArray.includes(filePatch)) {
            if (!multipleImage) {
                if (filemanaerselectedfilesArray.length <1) {
                    filemanaerselectedfilesArray.push(filePatch)
                }
            }else{
                filemanaerselectedfilesArray.push(filePatch)
            }
        }
        let seperatedImages = filemanaerselectedfilesArray.join();
        if (!multipleImage) {
            seperatedImages = filePatch;
        }

        // console.log(seperatedImages,'seperatedImages');
        $('input[name="filemanaerselectedfiles"]').val(seperatedImages)
    }
    // console.log(filemanaerselectedfilesArray,'filemanaerselectedfilesArray');
}

const addFilestoField = (btn) => {

    let filemanaerselectedfiles = $('input[name="filemanaerselectedfiles"]').val()
    let filemanaerselectedfilesArray = [];
    if (filemanaerselectedfiles != '') {
        filemanaerselectedfilesArray = filemanaerselectedfiles.split(',');
    }
    let inputName = $('input[name="inputfielddata"]').val();
    let inputFieldData = currentField;
    // let inputFieldData = $('input[name="' + inputName + '"]');
    let previewimgdiv = inputFieldData.parent().parent().find('.filemanager-image-preview');

    $(previewimgdiv).empty();
    let imagesext = ['gif','webp','svg','png','jpg','jpeg'];
    let filesext =['wmv','mkv','swf','flv','mov','avi','ogg','mpeg','mpg','mp4']
    filemanaerselectedfilesArray.map((e, i) => {
        let extension = e.substring(e.lastIndexOf('.') + 1);
        let viewfile = ``;
        if (imagesext.includes(extension)) {
            viewfile = `
            <img class="filemanager-previewImage" src="${appurl+e}"
            alt="" srcset="">
            `;
        }else if(filesext.includes(extension)){
            viewfile=`<div class="card-body fmapp-info-trigger filemanager-previewImage"><span class="feather-icon filemanager-documnet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></span></div>`;

        }else{
            viewfile = `<div class="card-body fmapp-info-trigger filemanager-previewImage">
                <i class="ri-file-pdf-fill text-danger filemanager-documnet"></i>
            </div>`;
        }
        console.log(extension,'e ha ye');
        $(previewimgdiv).append(`
        <div class="col-sm-3 px-1">
            <div class="card filemanager-preview-image" data-previewimage="${e}">
                <div
                    class=" rounded-end  bg-primary-light-5 close-over position-relative">
                    <button type="button" class="close-row btn-close " onClick="removepreviewImage(this)">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                ${viewfile}
            </div>
        </div>`);
    });
    inputFieldData.val(filemanaerselectedfiles);
    let fileAmountMessage = '';
    if (filemanaerselectedfilesArray.length > 0) {
        fileAmountMessage = `${filemanaerselectedfilesArray.length} files selected`;
    } else {
        fileAmountMessage = `Choose File`;
    }
    let fileamounts = inputFieldData.parent().find('.file-amount').html(
        fileAmountMessage);

    $('input[name="inputfielddata"]').val('');
    $('input[name="filemanaerselectedfiles"]').val('');
    $('#exampleModalLarge01').modal('hide');

    // $('.dz-message').css('display','flex');
    $('.dz-preview').remove();
}

$('input[name="search"]').on('input', function() {
    let searchval = $('input[name="search"]').val();
    fetchImages(1, searchval, null, null);
})

const removepreviewImage = (btn) => {
    let removeimage = $(btn).parent().parent().data('previewimage');
    // let fileldVlaue = $(fieldname).val();
    let field = $(btn).parent().parent().parent().parent().parent().find('.selected-files');
    let fileldVlaue = $(field).val();
    let fileldVlaueArray = fileldVlaue.split(',');
    let updatedValues = [];
    if (fileldVlaueArray.length > 0) {
        fileldVlaueArray.map((e, i) => {
            if (e != removeimage) {
                updatedValues.push(e)
            }
        })
    }
    let splicImages = '';
    let fileamoumtmsg = 'Choose File';
    let fileamount = $(btn).parent().parent().parent().parent().parent().find('.file-amount');
    if (updatedValues.length > 0) {
        splicImages = updatedValues.join();
        fileamoumtmsg = `${updatedValues.length} files selected`;
    } else {}

    $(fileamount).html(fileamoumtmsg);
    $(field).val(splicImages);
    $(btn).parent().parent().parent().remove();
}



const filemanagerImagepreview = () => {
    let selectedfiles = $('.selected-files');
    let imagesext = ['gif', 'webp', 'svg', 'png', 'jpg', 'jpeg'];
    let filesext = ['wmv', 'mkv', 'swf', 'flv', 'mov', 'avi', 'ogg', 'mpeg', 'mpg', 'mp4']
    selectedfiles.map((i, e) => {
        let allFiles = $(e).val();
        let inputName = $(e).attr('name');
        if(allFiles != ''){
            let allFilesArray = allFiles.split(',');
            let previewParent = $(e).parent().parent().find('.filemanager-image-preview');
            $(previewParent).empty();
            allFilesArray.map((ele, ind) => {
                let extension = ele.substring(ele.lastIndexOf('.') + 1);
                let viewfile = ``;
                if (imagesext.includes(extension)) {
                    viewfile = `
                    <img class="filemanager-previewImage" src="${appurl+ele}"
                    alt="" srcset="">
                    `;
                } else if (filesext.includes(extension)) {
                    viewfile =
                        `<div class="card-body fmapp-info-trigger filemanager-previewImage"><span class="feather-icon filemanager-documnet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></span></div>`;

                } else {
                    viewfile = `<div class="card-body fmapp-info-trigger filemanager-previewImage">
                        <i class="ri-file-pdf-fill text-danger filemanager-documnet"></i>
                    </div>`;
                }
                $(previewParent).append(`
                <div class="col-sm-3 px-1">
                    <div class="card filemanager-preview-image" data-previewimage="${ele}">
                        <div
                            class=" rounded-end  bg-primary-light-5 close-over position-relative">
                            <button type="button" class="close-row btn-close " onClick="removepreviewImage(this)">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        ${viewfile}
                    </div>
                </div>
                `);
            })

            let fileAmountMessage = '';
            if (allFilesArray.length > 0) {
                fileAmountMessage = `${allFilesArray.length} files selected`;
            } else {
                fileAmountMessage = `Choose File`;
            }
            $(e).parent().find('.file-amount').html(fileAmountMessage)
        }
    })
}

$(document).on('click', '.prev-page, .next-page', function(e) {
    e.preventDefault();
    let filemanaerselectedfiles = $('input[name="filemanaerselectedfiles"]').val();
    let inputfielddata = $('input[name="inputfielddata"]').val()
    let selectedData = $('input[name="' + inputfielddata + '"]').val();
    var page = $(this).data('page');
    let searchval = null;
    fetchImages(page, searchval, null, filemanaerselectedfiles);
});


$('input[name="filemanagersearch"]').on('input',function () {
    let filemanagersearch = $('input[name="filemanagersearch"]').val();
    let filemanaerselectedfiles = $('input[name="filemanaerselectedfiles"]').val();
    fetchImages(1, filemanagersearch, null, filemanaerselectedfiles);

})

const filemanagerclearselection = ()=>{
    $(currentField).val('');
    $('input[name="filemanaerselectedfiles"]').val('');
    let previewImgDiv =  $(currentField).parent().parent().find('.filemanager-image-preview');
    previewImgDiv.empty();
    $(previewImgDiv).parent().find('.file-amount').html('Choose File');
    fetchImages(1, null, null, null);
    let selectedfilemsg = `0 Files Selected`;
    $('.no_ofselectedfiles').html(selectedfilemsg);

}

$(document).ready(function () {
    filemanagerImagepreview();

})
