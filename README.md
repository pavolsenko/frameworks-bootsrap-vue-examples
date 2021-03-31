# Webové frameworky

## Bootstrap

### 1. Štartovací template `index.html`

```html
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
```

### 2. Containery 
#### 2.1 Základný container
```html
<div class="container">
    Hello, world!  
</div>
```
#### 2.2 Fluid container zaberá celú šírku
```html
<div class="container-fluid">
    Hello, world!
</div>
```
#### 2.3 Responzívne containery
```html
<div class="container-sm">100% wide until small breakpoint</div>
<div class="container-md">100% wide until medium breakpoint</div>
<div class="container-lg">100% wide until large breakpoint</div>
<div class="container-xl">100% wide until extra large breakpoint</div>
<div class="container-xxl">100% wide until extra extra large breakpoint</div>
```

### 3. Stĺpce
```html
<div class="container">
  <div class="row">
    <div class="col-6">col-5</div>
    <div class="col-4">col-4</div>
    <div class="col-2">col-2</div>
    <div class="col-12">col-12</div>
    <div class="col-3">col-3</div>
    <div class="col-3">col-3</div>
    <div class="col-3">col-3</div>
    <div class="col-3">col-3</div>
  </div>
</div>
```
### 3. Navbar
```html
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
```

### 4. Navbar + farby
```html
<nav class="navbar navbar-dark bg-primary">
    <!-- Navbar content -->
</nav>
```

## Vue.js

### 1. Predtým, než začneme 

- prelinkujeme si zdrojový kód frameworku 

```html
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
```

- vytvoríme si súbor `app.js` a prelinkujeme ho 
```html
<script src="app.js"></script>
```

### 2. Náš prvý script vo Vue.js
#### HTML
```html
<div id="app">
    <div>
        {{ counter }}
    </div>

    <div>
        <button class="btn btn-primary" v-on:click="incrementValue"> +1 </button>
    </div>

    <div>
        <button class="btn btn-dager" v-on:click="decrementValue"> -1 </button>
    </div>
</div>
```
#### Javascript
```javascript
new Vue({
  el: '#app',
  data: {
    counter: 0,
  },
  methods: {
    incrementValue() {
      this.counter++;
    },
    decrementValue() {
      this.counter--;
    },
  },
});
```
### 3. Vytvorenie formulára
```html
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
```

### 4. Odoslanie formulára
Na odoslanie dát budeme potrebovať dalšiu knižnicu `axios`
```html
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
```

```javascript
new Vue({
    el: '#app',
    data: {
        name: '',
        email: '',
        message: '',
        errorMessage: '',
        successMessage: '',
    },
    methods: {
        sendEmail(){
            axios.post('http://kurz2.webtip.sk/mail.php', {
                name,
                email,
                message,
            }, {headers: {"Content-Type": "multipart/form-data"},})
                .then((res) => {
                    console.log(res);
                 })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
});
```

### 5. Pridanie spinnera
```html
<div class="spinner-border" role="status">
  <span class="visually-hidden">Loading...</span>
</div>