
//function to edit station
function editStation(that){
    let station_id = $(that).attr('data-id');
    let station_name = $(that).attr('data-station');

    $('#station_id').val(station_id);
    $('#station_name').val(station_name);

}

//function to edit station
function editSubStation(that){
    let id = $(that).attr('data-id');
    let station_id = $(that).attr('data-station_id');
    let sub_station = $(that).attr('data-sub_station');

    $('#sub_station_id').val(id);
    $('#station_id').val(station_id); 
    $('#sub_station').val(sub_station); 
}  

//function to edit user
function editUser(that){ 
 
    let user_id = $(that).attr('data-id');
    let username = $(that).attr('data-username');
    let firstname = $(that).attr('data-firstname');
    let lastname = $(that).attr('data-lastname');
    let email = $(that).attr('data-email'); 
    let user_role = $(that).attr('data-user-role');    
    let station = $(that).attr('data-station');    
    let substation = $(that).attr('data-substation');    

    $('#user_id').val(user_id);
    $('#username').val(username);
    $('#fname').val(firstname);
    $('#lname').val(lastname)
    $('#email').val(email)
    $('#user-role1 option[value="'+user_role+'"]').prop("selected", true); 
    if(station){
        $('#user_station1 option[value="'+station+'"]').prop("selected", true); 
    }else{
        $("#user_station1").attr('disabled', true);
        $("#user_station1").empty();
    }
    if(substation){
        $('#user_substation1 option[value="'+substation+'"]').prop("selected", true); 
    }else{
        $("#user_substation1").attr('disabled', true);
        $("#user_substation1").empty();
    }
   
   
}


//function to edit user
function changePassword(that){ 
 
    let user_id = $(that).attr('data-id');  
    console.info(user_id) 
    $('#changePassword #user_id').val(user_id);   
}
 

// Add Marep


$('select#station').on('change', function(e){
    e.preventDefault();
    var text = $(this).find(':selected').text() 
    var station_id = $(this).val() 
    $('input[name="station"]').val(station_id)
    var text = text.replace('CGS ', "");  
    $('#station-text').text(text)

    if(station_id != ""){
        $.ajax({
            url: BASE_URL + 'substation/get_substation_by_station/' + station_id,
            type: 'POST',  
            dataType: 'JSON',
            success: function(data){  
                $('#toggle-hidden').removeClass('hidden')
                $("#sub-station").empty();
                $("#sub-station").append(new Option("Select", "" ))
                $.each(data , function(index, val) { 
                    $("#sub-station").append(new Option(val.sub_station, val.sub_station_id ));
                });
            },
            error: function(xhr, textStatus, error){
                console.info(xhr.responseText);
            }
    
        });

    }else{
        $('#toggle-hidden').addClass('hidden')
        $("#sub-station").empty();

    }


})


$('select#sub-station').on('change', function(e){
    e.preventDefault();
    var text = $(this).find(':selected').text() 
    var sub_station_id = $(this).val()  
    
    console.info(sub_station_id)
    $('input[name="sub_station"]').val(sub_station_id)  
})


$('select#report-selection').on('change', function(e){
    e.preventDefault(); 
    var id = $(this).val(); 
    $('input[name="report_selection"]').val(id)
    $('.toggle-show').css({"display": "none" }); 
    $('.toggle-show[data-id="'+id+'"]').css({"display": "block" }); 

})


$('select#report-type').on('change', function(e){
    e.preventDefault(); 
    var report_type = $(this).val(); 
    $('.toggle-show').css({"display": "none" });
    $('.toggle-show[data-id="'+report_type+'"]').css({"display": "block" }); 
})



$('select#maritime-incident').on('change', function(e){
    e.preventDefault(); 
    var maritime_incident = $(this).val();  
    $('input[name="maritime_incident"]').val(maritime_incident)
    $('.toggle-show').css({"display": "none" });
    $('.toggle-show[data-id="'+maritime_incident+'"]').css({"display": "block" }); 
    // clear input whenever a marine incident alters
    $('input[type=checkbox].step-2').prop("checked", false);
    $("select.step-2 option:selected").prop("selected", false);
    $("input[type=text].step-2").val('')
}) 



var navListItems = $('div.setup-panel div a'),
    allWells = $('.setup-content'),
    allNextBtn = $('.nextBtn');

allWells.hide();

navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
        $item = $(this);

    if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-success').addClass('btn-default');
        $item.addClass('btn-success');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
    }
});

allNextBtn.click(function () {
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        // curInputs = curStep.find("select,input[type='text']"), 
        curInputs = curStep.find(""),
        isValid = true;
    
    $(".form-group").removeClass("has-error");
    for (var i = 0; i < curInputs.length; i++) { 
        if (!curInputs[i].validity.valid) {
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
    }

    if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
});

$('div.setup-panel div a.btn-success').trigger('click'); 

 
//function to edit user role
function editUserRole(that){ 
    let user_role_id = $(that).attr('data-id');  
    let user_role = $(that).attr('data-text');  
    $('#role').val(user_role);   
    $('#user_role_id').val(user_role_id);   
} 

// print a page
$(function() {
    $("#print").on("click", function() {
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
        $("div.printableArea").printArea(options);
    });
});

if (window.location.href.indexOf("edit_marep") > -1 || 
window.location.href.indexOf("edit_urban_marsar") > -1 || 
window.location.href.indexOf("edit_marslec") > -1 || 
window.location.href.indexOf("edit_marsar") > -1 || 
window.location.href.indexOf("edit_marsaf") > -1) {
    selectSubStation()
    selectReportSelection()
    selectMaritimeIncident()
    selectReportType()
}

function selectReportSelection(){
    var id = $('#or_report').val(); 
    $('input[name="report_selection"]').val(id)
    $('.toggle-show').css({"display": "none" }); 
    $('.toggle-show[data-id="'+id+'"]').css({"display": "block" }); 
}
function selectMaritimeIncident(){ 
    var maritime_incident = $('#or_maritime_incident_type').val(); 
    $('input[name="maritime_incident"]').val(maritime_incident)
    $('.toggle-show').css({"display": "none" });
    $('.toggle-show[data-id="'+maritime_incident+'"]').css({"display": "block" }); 
    // clear input whenever a marine incident alters
    $('input[type=checkbox].step-2').prop("checked", false);
    $("select.step-2 option:selected").prop("selected", false);
    $("input[type=text].step-2").val('')
    console.log(maritime_incident)
}
function selectReportType(){
    
    var report_type = $('#or_report_type').val();
    if(report_type){
        $('.toggle-show').css({"display": "none" });
        $('.toggle-show[data-id="'+report_type+'"]').css({"display": "block" }); 
    }
    
}

// edit selection
function selectSubStation(){
    var text = $('#station').find(':selected').text() 
    var org_station_id = $('#or_substation').val() 
    var station_id = $('#station').val() 
    $('input[name="station"]').val(station_id)
    var text = text.replace('CGS ', "");  
    $('#station-text').text(text)
    if(station_id != ""){
        $.ajax({
            url: BASE_URL + 'substation/get_substation_by_station/' + station_id,
            type: 'POST',  
            dataType: 'JSON',
            success: function(data){  
                $('#toggle-hidden').removeClass('hidden')
                $("#sub-station").empty();
                $("#sub-station").append(new Option("Select", "" ))
                $.each(data , function(index, val) {
                    console.log(val.sub_station_id === org_station_id)
                    if(val.sub_station_id === org_station_id){
                        $("#sub-station").append(new Option(val.sub_station, val.sub_station_id, true, true));
                    }else{
                        $("#sub-station").append(new Option(val.sub_station, val.sub_station_id));
                    }
                    
                });
            },
            error: function(xhr, textStatus, error){
                console.info(xhr.responseText);
            }
        });
    }else{
        $('#toggle-hidden').addClass('hidden')
        $("#sub-station").empty();

    }

}

$('#user-role,#user-role1').on('change', function(){
    var user = $(this).val();
    if(user == 1){
        $("#user_station,#user_station1").attr('disabled', true);
        $("#user_substation,#user_substation1").attr('disabled', true);
        $("#user_station,#user_station1").empty();
        $("#user_substation,#user_substation1").empty();
    }
    if(user == 2){
        $("#user_station,#user_station1").attr('disabled', false);
        $("#user_substation,#user_substation1").attr('disabled', 'readonly');

        getSubstation()
    }
    if(user != 1 && user != 2){
        $("#user_station,#user_station1").attr('disabled', false);
        $("#user_substation,#user_substation1").attr('disabled', false);

        getSubstation()
    }
})

$('select#user_station,select#user_station1').on('change', function(){
    var station_id = $(this).val() 
    if(station_id != ""){
        $.ajax({
            url: BASE_URL + 'substation/get_substation_by_station/' + station_id,
            type: 'POST',  
            dataType: 'JSON',
            success: function(data){  
                $("#user_substation,#user_substation1").empty();
                $("#user_substation,#user_substation1").append(new Option("Select", "" ))
                $.each(data , function(index, val) { 
                    $("#user_substation,#user_substation1").append(new Option(val.sub_station, val.sub_station_id ));
                });
            },
            error: function(xhr, textStatus, error){
                console.info(xhr.responseText);
            }
        });
    }
})
function getSubstation(){
    $.ajax({
        url: BASE_URL + 'station/get_station',
        type: 'POST',  
        dataType: 'JSON',
        success: function(data){  
            $("#user_station,#user_station1").empty();
            $("#user_station,#user_station1").append(new Option("Select", "" ))
            $.each(data , function(index, val) { 
                $("#user_station,#user_station1").append(new Option(val.station, val.station_id ));
            });
        },
        error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
        }
    });
}

// Marsaf PDI
var clone_pdi_fieldset = $('#pdi-clone-btn');
var pdiContainers = $('.pdi_fieldset');

clone_pdi_fieldset.on('click', function() {
    console.info(1)
    var clonedFieldset = $('.pdi_fieldset:first').clone();
    var inputElements = clonedFieldset.find('input');

    inputElements.each(function(index, element) {
        var originalName = $(element).attr('name');
        var newName = originalName.replace(/\[(\d+)\]/g, function(match, index) {
        return '[' + (parseInt(index) + 1) + ']';
        });
        $(element).attr('name', newName);  

        if ($(element).attr('type') === 'text') {
            $(element).val('');
        } else if  ($(element).attr('type') === 'number') {
            $(element).val('');
        } else if ($(element).attr('type') === 'radio' || $(element).attr('type') === 'checkbox' ) {
            $(element).prop('checked', false);
        } 

        if($(element).is('textarea')){
            $(element).val(''); 
        }
        
    });
    pdiContainers.append(clonedFieldset); 

}); 

// remove last cloned fieldset but not first
$('#pdi-remove-clone-btn').click(function() {
    $('.pdi_fieldset:not(:first):last').remove();
}); 



// Marsaf VSEI
var clone_vsei_fieldset = $('#vsei-clone-btn');
var vseiContainers = $('.vsei_fieldset');

clone_vsei_fieldset.on('click', function() {  
    var clonedFieldset = $('.vsei_fieldset:first').clone();
    var inputElements = clonedFieldset.find('input');

    inputElements.each(function(index, element) {
        var originalName = $(element).attr('name');
        var newName = originalName.replace(/\[(\d+)\]/g, function(match, index) {
        return '[' + (parseInt(index) + 1) + ']';
        });
        $(element).attr('name', newName);  

        if ($(element).attr('type') === 'text') {
            $(element).val('');
        } else if  ($(element).attr('type') === 'number') {
            $(element).val('');
        } else if ($(element).attr('type') === 'radio' || $(element).attr('type') === 'checkbox' ) {
            $(element).prop('checked', false);
        } 

        if($(element).is('textarea')){
            $(element).val(''); 
        }
        
    });
    vseiContainers.append(clonedFieldset); 

}); 

// remove last cloned fieldset but not first
$('#vsei-remove-clone-btn').click(function() {
    $('.vsei_fieldset:not(:first):last').remove();
}); 





// Marsaf ERE
var clone_ere_fieldset = $('#ere-clone-btn');
var ereContainers = $('.ere_fieldset');

clone_ere_fieldset.on('click', function() {  
    var clonedFieldset = $('.ere_fieldset:first').clone();
    var inputElements = clonedFieldset.find('input');

    inputElements.each(function(index, element) {
        var originalName = $(element).attr('name');
        var newName = originalName.replace(/\[(\d+)\]/g, function(match, index) {
        return '[' + (parseInt(index) + 1) + ']';
        });
        $(element).attr('name', newName);  

        if ($(element).attr('type') === 'text') {
            $(element).val('');
        } else if  ($(element).attr('type') === 'number') {
            $(element).val('');
        } else if ($(element).attr('type') === 'radio' || $(element).attr('type') === 'checkbox' ) {
            $(element).prop('checked', false);
        } 

        if($(element).is('textarea')){
            $(element).val(''); 
        }
        
    });
    ereContainers.append(clonedFieldset); 

}); 

// remove last cloned fieldset but not first
$('#ere-remove-clone-btn').click(function() {
    $('.ere_fieldset:not(:first):last').remove();
}); 



// Marsaf PSC
var clone_psc_fieldset = $('#psc-clone-btn');
var pscContainers = $('.psc_fieldset');

clone_psc_fieldset.on('click', function() {  
    var clonedFieldset = $('.psc_fieldset:first').clone();
    var inputElements = clonedFieldset.find('input');

    inputElements.each(function(index, element) {
        var originalName = $(element).attr('name');
        var newName = originalName.replace(/\[(\d+)\]/g, function(match, index) {
        return '[' + (parseInt(index) + 1) + ']';
        });
        $(element).attr('name', newName);  

        if ($(element).attr('type') === 'text') {
            $(element).val('');
        } else if  ($(element).attr('type') === 'number') {
            $(element).val('');
        } else if ($(element).attr('type') === 'radio' || $(element).attr('type') === 'checkbox' ) {
            $(element).prop('checked', false);
        } 

        if($(element).is('textarea')){
            $(element).val(''); 
        }
        
    });
    pscContainers.append(clonedFieldset); 

}); 

// remove last cloned fieldset but not first
$('#psc-remove-clone-btn').click(function() {
    $('.psc_fieldset:not(:first):last').remove();
}); 




// Marsaf cabrsasi
var clone_cabrsasi_fieldset = $('#cabrsasi-clone-btn');
var cabrsasiContainers = $('.cabrsasi_fieldset');

clone_cabrsasi_fieldset.on('click', function() {  
    var clonedFieldset = $('.cabrsasi_fieldset:first').clone();
    var inputElements = clonedFieldset.find('input');

    inputElements.each(function(index, element) {
        var originalName = $(element).attr('name');
        var newName = originalName.replace(/\[(\d+)\]/g, function(match, index) {
        return '[' + (parseInt(index) + 1) + ']';
        });
        $(element).attr('name', newName);  

        if ($(element).attr('type') === 'text') {
            $(element).val('');
        } else if  ($(element).attr('type') === 'number') {
            $(element).val('');
        } else if ($(element).attr('type') === 'radio' || $(element).attr('type') === 'checkbox' ) {
            $(element).prop('checked', false);
        } 

        if($(element).is('textarea')){
            $(element).val(''); 
        }
        
    });
    cabrsasiContainers.append(clonedFieldset); 

}); 

// remove last cloned fieldset but not first
$('#cabrsasi-remove-clone-btn').click(function() {
    $('.cabrsasi_fieldset:not(:first):last').remove();
}); 





// Marsaf rsei
var clone_rsei_fieldset = $('#rsei-clone-btn');
var rseiContainers = $('.rsei_fieldset');

clone_rsei_fieldset.on('click', function() {  
    var clonedFieldset = $('.rsei_fieldset:first').clone();
    var inputElements = clonedFieldset.find('input');

    inputElements.each(function(index, element) { 
        var originalName = $(element).attr('name');
        var newName = originalName.replace(/\[(\d+)\]/g, function(match, index) {
        return '[' + (parseInt(index) + 1) + ']';
        });
        $(element).attr('name', newName);  

        if ($(element).attr('type') === 'text') {
            $(element).val('');
        } else if  ($(element).attr('type') === 'number') {
            $(element).val('');
        } else if ($(element).attr('type') === 'radio' || $(element).attr('type') === 'checkbox' ) {
            $(element).prop('checked', false);
        } 

        if($(element).is('textarea')){
            $(element).val(''); 
        }
        
    });
    rseiContainers.append(clonedFieldset); 

}); 

// remove last cloned fieldset but not first
$('#rsei-remove-clone-btn').click(function() {
    $('.rsei_fieldset:not(:first):last').remove();
}); 



