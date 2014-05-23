// This function creates a standard table with column/rows
// Parameter Information
// objArray = Anytype of object array, like JSON results
// theme (optional) = A css class to add to the table (e.g. <table class="<theme>">
// enableHeader (optional) = Controls if you want to hide/show, default is show
function CreateTableView(objArray, id, height, img_path, theme, enableHeader) {
    // set optional theme parameter
    if (theme === undefined) {
        theme = 'mediumTable'; //default theme
    }

    if (enableHeader === undefined) {
        enableHeader = true; //default enable headers
    }
   
    var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
	$str1 = "scroll_grid_view_";
	
    var str ='<div class="'+$str1.concat(id)+'" style="height:' + height +'px; overflow-y: scroll; overflow-x: hidden;">';
    str += '<div id="images" class="div-table">';
    //'<table class="' + theme + '">';

    // table head
    if (enableHeader) {
        str += '<div class="div-table-row" style="width:100%">';
        for (var index in array[0]) {
        	str += '<div class="div-table-col" style="width:5%; background:#dddddd;"><strong>' + index + '</strong></div>';
         }
         
        str += '</div>';
    }

    // table body
    //str += '<tbody>';
    var count =0;
    for (var i = 0; i < array.length; i++) {
    	//<div class="div-table-row" style="width:100%">
       // str += (i % 2 == 0) ? '<tr class="alt">' : '<tr>';
       //str += (i % 2 == 0) ? '<div class="alt">' : '<tr>';
       str += '<div class="div-table-row" style="width:100%">';
        for (var index in array[i]) {
        	//alert();
        	//alert(array[i][index].substr(-4) );
        	var img = array[i][index].substr(-4);
        	var unique_id = array[i][index].substr(6);
        	var radio = array[i][index].substr(0,5);
        	var name1 = "'name_"+unique_id+"'";
			var tsname = "'"+id+"'";
        	//alert(radio);
        	if( img === ".gif" || img === ".png" || img === ".jpg" || img === ".svg")  {
        		str += '<div class="div-table-col" style="border-top:0px;">' + '<img src="' + img_path + array[i][index] + '"/>' + '</div>';
        	} else if(radio === "radio") {
        		if(count == 0) { 
					count++;
					str += '<div class="div-table-col" style="border-top:0px;">' + '<input type="radio" checked id="name_'+unique_id +'" original-title="" name="list" value="'+unique_id +'"  onclick="document.getElementById('+tsname+').value = document.getElementById('+name1+').value">'+ '</div>';
					} else {
						str += '<div class="div-table-col" style="border-top:0px;">' + '<input type="radio" id="name_'+unique_id +'" original-title="" name="list" value="'+unique_id +'"  onclick="document.getElementById('+tsname+').value = document.getElementById('+name1+').value">'+ '</div>';
				}
        	} else {
            	str += '<div class="div-table-col" style="border-top:0px;">' + array[i][index] + '</div>';
           }
        }
       
        str += '</div>';
    }
   // str += '</tbody>'
    str += '</div>';
    str += '</div>';
    return str;
}

// This function creates a standard table with column/rows
// Parameter Information
// objArray = Anytype of object array, like JSON results
// theme (optional) = A css class to add to the table (e.g. <table class="<theme>">
// enableHeader (optional) = Controls if you want to hide/show, default is show
function CreateTableViewX(objArray, theme, enableHeader) {
    // set optional theme parameter
    if (theme === undefined) {
        theme = 'mediumTable'; //default theme
    }

    if (enableHeader === undefined) {
        enableHeader = true; //default enable headers
    }

    var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
    
    var str = '<table class="' + theme + '">';

    // table head
    if (enableHeader) {
        str += '<thead><tr>';
        for (var index in array[0]) {
            str += '<th scope="col">' + index + '</th>';
        }
        str += '</tr></thead>';
    }

    // table body
    str += '<tbody>';
    for (var i = 0; i < array.length; i++) {
        str += (i % 2 == 0) ? '<tr class="alt">' : '<tr>';
        for (var index in array[i]) {
            str += '<td>' + array[i][index] + '</td>';
        }
        str += '</tr>';
    }
    str += '</tbody>'
    str += '</table>';
    return str;
}

// This function creates a details view table with column 1 as the header and column 2 as the details
// Parameter Information
// objArray = Anytype of object array, like JSON results
// theme (optional) = A css class to add to the table (e.g. <table class="<theme>">
// enableHeader (optional) = Controls if you want to hide/show, default is show
function CreateDetailView(objArray, theme, enableHeader) {
    // set optional theme parameter
    if (theme === undefined) {
        theme = 'mediumTable';  //default theme
    }

    if (enableHeader === undefined) {
        enableHeader = true; //default enable headers
    }

    var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;

    var str = '<table class="' + theme + '">';
    str += '<tbody>';

    for (var i = 0; i < array.length; i++) {
        var row = 0;
        for (var index in array[i]) {
            str += (row % 2 == 0) ? '<tr class="alt">' : '<tr>';

            if (enableHeader) {
                str += '<th scope="row">' + index + '</th>';
            }
			
            str += '<td>' + array[i][index] + '</td>';
            str += '</tr>';
            row++;
        }
    }
    str += '</tbody>'
    str += '</table>';
    return str;
}
