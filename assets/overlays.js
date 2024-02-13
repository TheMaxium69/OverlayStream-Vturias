var widthInput = document.getElementById('widthInput');
var heightInput = document.getElementById('heightInput');
var dimensionsOutput = document.getElementById('dimensionsOutput');
var btnLinkOverlay = document.getElementById('linkOver');

widthInput.addEventListener('input', updateDimensions);
heightInput.addEventListener('input', updateDimensions);

function updateDimensions() {

    var width = widthInput.value || 0;
    var height = heightInput.value || 0;

    dimensionsOutput.textContent = 'width=' + width + '&height=' + height;

    var dataUrlValue = btnLinkOverlay.getAttribute('data-url');
    btnLinkOverlay.href = dataUrlValue + 'width=' + width + '&height=' + height;
}