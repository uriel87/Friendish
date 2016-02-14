

/*
* fuction to read jason file Categories.json for index.html
*/


$(document).ready(function() {
	initCategories();
});

var initCategories = function() { 
	console.log('hello jason');
	$.getJSON("./data/Categories.json", function(data) {
		console.log(data);
		
		var categoriesContainer = $("#categorySection"); 
		$.each(data.categories, function(){
			var newCategory =  $('<div>');
			newCategory.addClass("categoryBoxIndex");
			newCategory.append("<a href='reasultSearch.php?category=" + this.name + "'><img src='images/" + this.img +
				".jpg' class='img-responsive' alt=" + this.name + "title= + this.name ></a>");
			newCategory.append("<div></div>");
			newCategory.append("<h3>" + this.name + "</h3>");
			categoriesContainer.append(newCategory);
		});
	});
};