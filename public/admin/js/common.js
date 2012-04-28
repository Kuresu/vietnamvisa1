$(function () {
	$('[class*=_delete]').click(function () {
		if(confirm('Do you want delete this item ?')) {
			return true;
		}
		else return false;
	});
	
	$('#check_all').click(function () {
		var status = $(this).attr('checked');
		$('input[type=checkbox]').attr('checked', status);
	});
});

function check_all(input)
{
	var status = $(input).attr('checked');
	if(status == 'checked'){
		var check	=	true;
	}else{
		check	=	false;
	}
	$('input[type=checkbox]').attr('checked', check);
}

function in_array(needle,haystack,argStrict){
    var key='',strict=!!argStrict;if(strict){
        for(key in haystack){
            if(haystack[key]===needle){
                return true;
            }
        }
    }else{
        for(key in haystack){
            if(haystack[key]==needle){
                return true;
            }
        }
    }
    return false;
}
function strpos(haystack,needle,offset){
    var i=(haystack+'').indexOf(needle,(offset?offset:0));
    return i===-1?false:i;
}

function rand(min,max){
    var argc=arguments.length;if(argc===0){
        min=0;max=2147483647;
    }else if(argc===1){
        throw new Error('Warning: rand() expects exactly 2 parameters, 1 given');
    }
    return Math.floor(Math.random()*(max-min+1))+min;
}
function show_success(div_re,mess){
	 $("#"+div_re).html("<div class='success'><h2>"+mess+"</h2></div>");
}
function show_error(div_re,mess){
	 $("#"+div_re).html("<div class='error'><h2>"+mess+"</h2></div>");
}