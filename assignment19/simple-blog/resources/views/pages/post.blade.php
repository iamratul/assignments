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

        getPostData();
        async function getPostData() {
            try {
                let url = "/postData";
                let result = await axios.get(url);
                const post = result.data;

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
