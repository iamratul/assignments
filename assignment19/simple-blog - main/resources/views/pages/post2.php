@extends('app')
@section('content')
    <div class="row g-5">
        <div class="col-md-8 col-offset-md-2">
            <article class="blog-post" id="blog-post">
                {{-- Post Detail --}}
            </article>
        </div>
    </div>

    <script>
        // const post = @json($post);
        // getPost();
        // async function getPost() {
        //     try {
        // const response = await axios.get(`/api/posts/${postId}`);
        // const response = await axios.get(`/posts/${postId}`);
        // const post = response.data;

        // Render the post data on the page
        // const postContainer = document.querySelector('.blog-post');
        // postContainer.innerHTML = `
    //     <h2 class="display-5 link-body-emphasis mb-1">${post.title}</h2>
    //     <p class="blog-post-meta">${post.created_at} by <a href="#">${post.user.name}</a></p>
    //     <img class="w-100 h-100 mb-3" src="${post.image}" alt="Post Image">
    //     <p>${post.content}</p>
    // `;
        //     } catch (error) {
        //         alert(error);
        //     }
        // }
        // }

        const postId = {{ $post->id }};

        getPost();
        async function getPost() {
            try {
                const response = await axios.get(`/posts/${postId}`);
                const post = response.data;
                // let userResponse = await axios.get(`/users/${post.user_id}`);
                // let user = userResponse.data;

                // Render the post data on the page
                const postContainer = document.querySelector('.blog-post');
                postContainer.innerHTML = `
                    <h2 class="display-5 link-body-emphasis mb-1">${post.title}</h2>
                    <p class="blog-post-meta">${post.created_at} by <a href="#">Admin</a></p>
                    <img class="w-100 h-100 mb-3" src="${post.image}" alt="Post Image">
                    <p>${post.content}</p>
                `;
            } catch (error) {
                alert(error);
            }
        }
    </script>
@endsection
