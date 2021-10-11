const cf = document.querySelector("#stora");
const fc = document.querySelector("#sma");

cf.addEventListener("change", function() {
    sma.checked = !sma.checked;
})
fc.addEventListener("change", function() {
    stora.checked = !stora.checked;
})