//CHIPS
    var a =['rooms','dinner'];
    $.get("/bookie/getfacility",function (res){
        $.each(res, function(k,v){
            a.push(v);
        });
        initList(a);
    });
    function initList(a){
        $('#tokenfield').tokenfield({
            autocomplete: {
              source: a,
              delay: 100
            },
            showAutocompleteOnFocus: true
        });
    }
    $('#tokenfield').on('tokenfield:createtoken', function (event) {
        var existingTokens = $(this).tokenfield('getTokens');
        $.each(existingTokens, function(index, token) {
            if (token.value === event.attrs.value)
                event.preventDefault();
        });
    });
    $('#cover_img').change(function (){
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
            $('.update_btn').removeClass('hidden');
            $('.add_btn').addClass('hidden');
        }
        reader.readAsDataURL(this.files[0]);
    })
    $('#tokenfield').change(function (){
        $("#bootstrapTagsInputForm").formValidation('validateField', 'facilities');
    })
    $("#bootstrapTagsInputForm").formValidation({
        message:"This is'n valid value",
        icon:{
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields:{
            'cover_img':{
                validators:{
                    file:{
                        extension:'jpg,jpeg,png',
                        type:'image/jpg,image/jpeg,image/png',
                        message:'Only images allowed..'
                    }
                }
            },
            'name':{
                validators:{
                    notEmpty:{
                        message:'What`s your Hotel name ?'
                    }
                }
            },
            'description':{
                validators:{
                    notEmpty:{
                        message:'Describe your Hotel here...'
                    }
                }
            },
            'address':{
                validators:{
                    notEmpty:{
                        message:'Your Hotel address here...'
                    }
                }
            },
            'location':{
                validators:{
                    notEmpty:{
                        message:'Where to find your Hotel...?'
                    }
                }
            },
            facilities:{
                validators:{
                    notEmpty:{
                        message:'Hotels with No facilities ??'
                    }
                }
            }
        }
    });