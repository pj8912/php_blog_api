async function uploadMessage() {
    //values 


    const title = document.querySelector('.title').value;

    // const post = document.querySelector('.title').value;
    const body = document.querySelector('.body').value;
    const author = document.querySelector('.author').value;
    const category = document.querySelector('.cat').value;

    if (title === null || body === null || author === null || category === null) {
        alert('Please Enter something..')
        return false
    }



    await fetch('api/post/create.php', {
        method: "POST",
        body: JSON.stringify({
            title: title,
            body: body,
            author: author,
            category: category
        })

    })


    // document.querySelector('.success_div').innerHTML = '<h3>Post Created!!</h3>'

    document.querySelector('.success_div').innerHTML = setTimeout(function() {
        document.querySelector('.success_div').innerHTML = '<h3>Post Created!!</h3>'
    }, 3000);





}

async function fetchPosts() {
    const response = await fetch('api/post/getPosts.php');
    await response.json().then(
        post => {
            let op = '';
            for (let i in post) {
                if (!post[i].title) {
                    op += "no posts";
                } else {
                    op += `
                        <p style="padding:1px">
                            <h4>Title: ${post[i].title}</h4>
                            <span style="font-size:10px" align="center">
                                category: ${post[i].c_name}
                            </span>

                        </p>
                    `;
                }
            }
            document.getElementById('post-box').innerHTML = op;
        })
}