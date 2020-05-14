<?php
    require "sidebaradmindashboard.php";
    require "includes/dbh.inc.php"
?>

<main>
    <div class="user-profile--main-content">
        <div class="user-profile--header">
            <h2>Blogs Overview</h2>
        </div>  

        <div class="admin-info--flex">
            <div class="admin-info--content">
                <div class="admin-info--applicant-table expand">
                    <div class="admin-text--header">
                        <h5>List Of Blogposts</h5>
                        <a href="#" id="addPost">Add New Post</a>
                    </div>

                    <div class="admin-text--content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Post ID</th>
                                    <th>Post Author</th>
                                    <th>Post Title</th>
                                    <th>Post Date</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($conn, 'SELECT * FROM blogs');
                                $index = 1;
                                // if(($row = mysqli_fetch_assoc($result))){
                                    while($row = $result->fetch_assoc()){
                                        $postid = $row['postID'];
                                        echo "<tr>";
                                        echo "<td>".$index."</td>";
                                        echo "<td>".$row['postAuthor']."</td>";
                                        echo "<td>".$row['postTitle']."</td>";
                                        echo "<td>".$row['postDate']."</td>";
                                        echo '<td><a href="admin.blog.view.php?postID='.$postid.'">View</button></a>';
                                        echo "<td><a>Update</a></td>";
                                        echo '<td><a href="includes/admin.remove.post.inc.php?postID='.$postid.'">Remove</button></a>';
                                        
                                        $index ++;
                                    }

                                // }
                                ?>  
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal">
        <span class="close">&times;</span> 
        <div class="modal--content"> 
            <img id="blah" src="assets/images/gradient.jpg">
            <form class="event--form" action="includes/admin.add.post.inc.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image" onchange="readURL(this);">
                <label>Author</label>
                <input type="text" name="author">
                <label>Title</label>
                <input type="text" name="title">
                <label>Date</label>
                <input type="date" name="date">
                <label>Description</label>
                <textarea name="description"></textarea>
                <label>Content</label>
                <textarea name="content"></textarea>
                <button type="submit" name="add-post">PUBLISH POST</button>
            </form>      
        </div>       
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("addPost");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
        modal.style.display = "block";
        }

        span.onclick = function() {
        modal.style.display = "none";
        }

        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            }
        }
    </script>
</main>