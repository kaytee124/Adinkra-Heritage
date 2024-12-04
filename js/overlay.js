function openDeleteOverlay(brandId) {
    let message = `Are you sure you want to delete the brand with ID ${brandId}?`;
    document.getElementById('overlay-message').innerHTML = message;
    document.getElementById('brand_id').value = brandId;
    document.getElementById('overlay').style.display = "block";
}

function closeOverlay() {
    document.getElementById('overlay').style.display = "none";
}

function redirectToAddProduct() {
    window.location.href = `../view/add-product.php`;
}
