<!DOCTYPE html>
<html lang="en">

<head>
    <title>Accordion List</title>
    <style>
        /* Basic styling for the accordion list */
        .accordionList {
            list-style: none;
            padding: 0;
            width: 300px;
            margin: auto;
        }

        .accordionItem {
            border: 1px solid #ccc;
            margin-bottom: 5px;
            overflow: hidden;
        }

        .accordionHeader {
            background-color: #f1f1f1;
            padding: 10px;
            cursor: pointer;
        }

        .accordion-content {
            display: none;
            padding: 10px;
        }

        /* Style the button */
        .toggle-button {
            padding: 10px;
            margin: 10px;
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
<button class="toggle-button" onclick="toggleAccordion()">Toggle Accordion</button>

<ul class="accordionList">
    <li class="accordionItem">
        <div class="accordionHeader" onclick="toggleItem(this)">
            <div class="accordion-content">
                <ul>
                    <li><a href="#">Exercise</a></li>
                    <li><a href="#">Nutrition</a></li>
                    <li><a href="#">Friends</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </li>
</ul>

<script>
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
</script>
</body>

</html>
