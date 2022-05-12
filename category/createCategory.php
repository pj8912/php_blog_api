<input type="text" id="category">
<button id="btn" onclick="uploadCategory()"> upload </button>

<hr>
<div id="allCats">
</div>


<script>
    async function uploadCategory() {
        fetchCats();

        const cats = document.getElementById('category').value
        if (cats === null || cats === '' || cats === ' ') {
            alert('Please Enter something..')
            return false
        } else {


            await fetch('uploadCat.php', {
                    method: "POST",
                    body: JSON.stringify({
                        data: cats
                    })
                })
                .catch(err => console.log(err))
                fetchCats();
        }

        document.getElementById('category').value = '';


    }


    async function fetchCats() {

        const response = await fetch('getCategories.php')

        await response.json().then(data => {

            let op = '';
            for (let i in data) {
                if (data[i].c_name == null) {
                    op += 'No categories avaialble'
                } else {
                    op += `<p style="marign:3px">${data[i].c_id} : ${data[i].c_name}</p><br>`
                }
            }
            document.querySelector('#allCats').innerHTML = op;

        })
       
    }

    window.onload = fetchCats();
</script>