<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Blog</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        #tabs {
            margin-bottom: 20px;
        }


        .tab {
            display: none;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .active-tab {
            width:60%;
            display: block;
        }

        /* Adjusted styles for tabs buttons */
        #tabs button {
            padding: 15px 30px;
            margin: 5px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        #view-tab-btn {
            background-color: #007bff; /* Blue color for View Posts button */
            color: #fff; /* White text color */
        }

        #add-tab-btn {
            background-color: #28a745; /* Green color for Add Post button */
            color: #fff; /* White text color */
        }
        #add-post-btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #post-text{
         width:90%;
         height:90%;
        }
        #add-post-btn:hover {
            background-color: #218838;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <div id="tabs">
        <button id="view-tab-btn">View Posts</button>
        <button id="add-tab-btn">Add Post</button>
    </div>

    <div id="view-tab" class="tab active-tab">
        <div id="posts-container">

        </div>
    </div>

    <div id="add-tab" class="tab">
        <form id="post-form">
            <textarea id="post-text" placeholder="Write your post here"></textarea>
            <button type="submit" id="add-post-btn">Add Post</button>
        </form>
    </div>

    <script>
        $(document).ready(function () {

            function loadPosts() {
                $.ajax({
                    url: 'get_posts.php',
                    method: 'GET',
                    success: function (data) {
                        $('#posts-container').html(data);
                    }
                });
            }


            loadPosts();


            $('#view-tab-btn').click(function () {
                $('.tab').removeClass('active-tab');
                $('#view-tab').addClass('active-tab');
                loadPosts();
            });

            $('#add-tab-btn').click(function () {
                $('.tab').removeClass('active-tab');
                $('#add-tab').addClass('active-tab');
            });


            $('#post-form').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: 'add_post.php',
                    method: 'POST',
                    data: { text: $('#post-text').val() },
                    success: function () {

                        $('#post-text').val('');

                        loadPosts();
                    }
                });
            });


            $('#posts-container').on('click', '.edit-post', function () {
                var postId = $(this).data('post-id');
                var new_text = prompt('Edit your post:', $('#post-' + postId + ' p').text());

                if (new_text !== null) {
                    $.ajax({
                        url: 'edit_post.php',
                        method: 'POST',
                        data: { id: postId, new_text: new_text },
                        success: function () {

                            loadPosts();
                        }
                    });
                }
            });


            $('#posts-container').on('click', '.delete-post', function () {
                var postId = $(this).data('post-id');

                $.ajax({
                    url: 'delete_post.php',
                    method: 'POST',
                    data: { id: postId },
                    success: function () {

                        loadPosts();
                    }
                });
            });
        });
    </script>

</body>

</html>