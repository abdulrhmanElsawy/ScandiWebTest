$(document).ready(function() {
    let selectproductType = $("#productType"),
        addProductForm = $("#product_form"),
        MoreInfoForm = $("#sec-form"),
        sizeInput = ` <label>DVD size (MB)</label><input id="size" required type="number" placeholde="size in MB" name="size">`,
        weightInput = ` <label>Book weight (kg) </label><input id="weight" required type="number" placeholde="weight in KG" name="weight">`,
        heightInput = ` <label>Item Height (cm)</label><input required id="height" type="number" placeholde="Height in CM" name="height">`,
        widthInput = ` <label>Item Width (cm)</label><input required id="width" type="number" placeholde="Width in CM" name="width">`,
        lengthInput = ` <label>Item Length (cm)</label><input required id="length" type="number" placeholde="Length in CM" name="length">`;

    selectproductType.on('change', function() {
        console.log(selectproductType.val());
        if (selectproductType.val() == "book") {
            MoreInfoForm.empty();
            MoreInfoForm.append(weightInput);
        } else if (selectproductType.val() == "dvd") {
            MoreInfoForm.empty();
            MoreInfoForm.append(sizeInput);
        } else if (selectproductType.val() == "furniture") {
            MoreInfoForm.empty();
            MoreInfoForm.append(heightInput);
            MoreInfoForm.append(widthInput);
            MoreInfoForm.append(lengthInput);
        }
    });




});