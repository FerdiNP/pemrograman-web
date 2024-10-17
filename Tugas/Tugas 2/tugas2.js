    const formInput = document.querySelector('.form-input');
    const textInput = document.querySelector('.text-input');
    const itemsList = document.querySelector('.items-list');

    let todos = [];

    formInput.addEventListener('submit',
        function(event) {
            event.preventDefault();
            addTodo(textInput.value);
        }
    );

    function addTodo(item) {
        if (item != '') {
            const todo = {
                id: Date.now(),
                name: item,
                properti: false
            };
            todos.push(todo);
            addToLocalStorage(todos);
            textInput.value = '';
        };
    };

    function showTodo(todos) {
        itemsList.innerHTML = '';
        todos.forEach(function(item) {
            const checked = item.completed ? 'checked':null;
            const li = document.createElement('li');
            li.setAttribute('class', 'item');
            li.setAttribute('data-key', item.id);
            if(item.completed == true) {
                li.classList.add('checked');
            }
            li.innerHTML = `<input type="checkbox" class="checkbox" ${checked}> ${item.name} <button class="delete-button">X</button>`;
            itemsList.append(li);
        });
    };

    function addToLocalStorage(todos) {
        localStorage.setItem('todos', JSON.stringify(todos));
        showTodo(todos);
    };

    function getFromLocalStorage() {
        const reference = localStorage.getItem('todos');
        if(reference) {
            todos = JSON.parse(reference);
            showTodo(todos);
        }
    };

    // Event listener untuk toggle status melalui klik item list
    itemsList.addEventListener('click', function(event) {
        // Cek jika elemen yang di-klik adalah item list dan bukan checkbox atau tombol delete
        if (event.target.tagName === 'LI' || event.target.classList.contains('item')) {
            const itemKey = event.target.getAttribute('data-key');
            toggle(itemKey);  // Panggil fungsi toggle untuk mengubah status completed
        }
        // Hapus item jika tombol delete di-klik
        if(event.target.classList.contains('delete-button')) {
            deleteTodo(event.target.parentElement.getAttribute('data-key'));
        }
    });

    function toggle(id) {
        // Cari item To-Do berdasarkan id dan ubah status completed
        todos.forEach(function(item) {
            if (item.id == id) {
                item.completed = !item.completed;
            }
        });
        addToLocalStorage(todos); // Update localStorage dan tampilkan kembali
    }


    function deleteTodo(id) {
        todos = todos.filter(function(item) {
                return item.id != id;
        });
        addToLocalStorage(todos);
    };


    getFromLocalStorage();

    itemsList.addEventListener('click', function(event){
        if(event.target.type === 'checkbox') {
            toggle(event.target.parentElement.getAttribute('data-key'));
        }
        if(event.target.classList.contains('delete-button')){
            deleteTodo(event.target.parentElement.getAttribute('data-key'));
        }
    });
