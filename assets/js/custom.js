function uploadart(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$("#displayart").attr("src", e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	}
}
function viewartistwall(artworkID, title, artStyle, price, file, status) {
	$("#udisplayart").attr("src", file);
	$("#uartworkID").val(artworkID);
	$("#utitle").val(title);
	$("#uartStyle").val(artStyle);
	$("#uprice").val(price);
	$("#ufile").val(file);
	if (status == 1) {
		$("#deletebtn").prop("disabled", true);
		$("#uartStyle").prop("disabled", true);
		$("#editbtn").prop("disabled", true);
		$("#utitle").prop("disabled", true);
		$("#uprice").prop("disabled", true);
	} else if (status == 0) {
		$("#deletebtn").prop("disabled", false);
		$("#uartStyle").prop("disabled", false);
		$("#editbtn").prop("disabled", false);
		$("#utitle").prop("disabled", false);
		$("#uprice").prop("disabled", false);
	}
}
function viewhome(artistID, name, artworkID, title, artStyle, date, price, file) {
	$("#vartistID").attr("href", "index.php?a=" + artistID);
	$("#vartStyleLink").attr("href", "index.php?s=" + artStyle);
	$("#vdisplayart").attr("src", file);
	$("#partworkID").val(artworkID);
	$("#vartStyle").text(artStyle);
	$("#partistID").val(artistID);
	$("#vtitle").text(title);
	$("#vprice").text(price);
	$("#pprice").val(price);
	$("#vname").text(name);
	$("#vdate").text(date);
	$("#vfile").text(file);
}
function viewcustomerwall(artworkID, customerID, dateSold, customerName, address, moneySpent, artistID, artistName, title, artStyle, date, price, file) {
	$("#cartistID").attr("href", "index.php?a=" + artistID);
	$("#cartStyleLink").attr("href", "index.php?s=" + artStyle);
	$("#cdisplayart").attr("src", file);
	$("#cartStyle").text(artStyle);
	$("#ctitle").text(title);
	$("#cprice").text(price);
	$("#cartistName").text(artistName);
	$("#cdateSold").text(dateSold);
	$("#cfile").text(file);
}
