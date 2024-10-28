function toggleItem(header) {
    var content = header.nextElementSibling;
    content.style.display = (content.style.display === 'block') ? 'none' : 'block';
}

function toggleAccordion() {
    var items = document.querySelectorAll('.accordionContent');
    items.forEach(function (item) {
        item.style.display = (item.style.display === 'block') ? 'none' : 'block';
    });
}