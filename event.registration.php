<?php
    require "alt-navbar.php";
    require "includes/dbh.inc.php"
?>

<main>
    <div class="main--event--section">
        <h2>REGISTRATION</h2>

        <div class="event--card-registration">
            <div class="image--bg">
            </div>

            <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "emptyfields"){
                    echo '<div class="alert danger">
                    <span class="closebtn" onclick="close(this);">&times;</span>
                    Empty Fields!
                  </div>';
                }else if($_GET['error'] == "invaliduser"){
                    echo '<div class="alert danger">
                    <span class="closebtn" onclick="close(this);">&times;</span>
                    Invalid User!
                  </div>';
                }                              
            }
            else if(isset($_GET['registration'])){
                if($_GET['registration'] == "success"){
                    echo '<div class="alert">
                    <span class="closebtn" onclick="close(this);">&times;</span>
                    Submitted Successfully!
                  </div>';
                } 
            }            
        ?>
            
            <div class="registration--form">
                <form action="includes/event.registration.inc.php" method="post">
                    <label class="text--label">event name</label>
                    <div class="custom-select">
                        <select name="eventname">
                            <option value="0">Select Event</option>
                            <?php
                            $result = mysqli_query($conn, 'SELECT * FROM events');
                            $index = 1;
                            while($row = $result->fetch_assoc()){
                                echo '<option value="'.$row['eventName'].'">'.$row['eventName'].'</option>';                                
                                $index ++;
                            }
                            ?>
                        </select>
                    </div>
                    
                    <label class="text--label">username</label>
                    <input type="text" name="username" placeholder="pyladies24">
                    <label class="text--label">are you attending?</label>
                    <input type="radio" id='yes' name="yes">
                    <span id="checkbox--choice" for="yes">yes</span>
                    <input type="radio" id='no' name="no">
                    <span id="checkbox--choice" for="no">no</span>    
                    <button type="submit" name="register-event">SUBMIT</button>        
                </form>
            </div>
    </div>

    <script>
        var x, i, j, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    for (k = 0; k < y.length; k++) {
                    y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
            });
        }
        function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
            arrNo.push(i)
            } else {
            y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
            }
        }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);

        function close(element){
            element.parentElement.style.display='none';
        }
    </script>
</main>