### Directives
Show the div or not
```
<div v-show="myBool"></div>
```

##### Render the div or not
```
<div v-if="myBool"><
/div>
<div v-else>
</div>
```

##### List rendering
```
<li v-for="todo in todos">
  
</li>
 
<li v-for="u in users">
    {{u.name}}{{$index}}
</li>
 
<li v-for="value in obj">
    {{$key}}{{value}}
</li>
```

##### Set CSS classes (with an object, e.g.
 {'bold-text': true, 'err-text': true })
```
<div :class="errorClasses"></div>
```
Toggle CSS classes on an element from JavaScript
```
data: {
    errorClasses: {
        'bold-text': true, 
        'err-text': true
    }
}
```

##### Hide until VueJS compile done
Prevent the page from showing your content before it's rendered by VueJS
```
<div v-cloak></div>
```

##### Don't perform VueJS compile
Tell VueJS to not parse a certain section of code
```
<div v-pre></div>
```

##### Get a DOM element (this.$els.myspan)
Reference DOM elements inside your VueJS methods
```
<span v-el:myspan></span>
```

##### Set HTML
```
<span v-html=”myhtml”></span>
```
##### Set Text
```
<span v-text=”mytext”></span>
```

### Events 
```
<button v-on:click='submit'>Go</button>
```

### Components
```
new Vue({
  components: { app: App }
})
```

### Filters
 
Common filters include: capitalize, debounce, currency, filterBy, json, limitBy, lowercase, orderBy, pluralize, and uppercase.
 
Show 5 Users
```
<li v-for="u in users | limitBy 5"></li>
```

Order by ID, descending
```
<li v-for="u in users | orderBy 'id' -1"></li>

```

Debounce events
```
<input @mousedown="onMouseDown | debounce 300"/>
```

Show users with names containing <mysearch>
```
<li v-for="u in users | filterBy mysearch in 'name'"></li>
```
 
### Key Aliases
- delete
- down
- enter
- esc
- left
- right
- space
- tab
- up 
- and single letters
```
<input type="text" @keyup.enter="onSubmit" v-model="firstName"/>
```
Example: How can I detect the <enter> key in an input box?

### Event Modifiers
Conveniently call stopPropagation and/or preventDefault
```
<a @click.stop.prevent="onEdit"></a>
```

### CSS Transitions
Define CSS classes: grow-transition, grow-enter, grow-leave
```
<div v-show="myBool" transition=”grow”>
</div>
```

### API
```
Vue.extend({ ... })        // creating components
```

```
Vue.nextTick(() => {...})
```

```
Vue.set(object, key, val)  // reactive
Vue.delete(object, key)
```

```
Vue.directive('my-dir', { bind, update, unbind })
// <div v-my-dir='...'></div>
```

```
Vue.elementDirective('my-dir', { bind, update, unbind })
// <my-dir>...</my-dir>
```

```
Vue.component('my-component', Vue.extend({ .. }))

Vue.partial('my-partial', '<div>hi </div>')
// <partial name='my-partial'></partial>
```

```
new Vue({
  data: { ... }
  props: ['size'],
  props: { size: Number },
  computed: { fullname() { return this.name + ' ' + this.lastName } },
  methods: { go() { ... } },
  watch: { a (val, oldVal) { ... } },
  el: '#foo',
  template: '...',
  replace: true, // replace element (default true)

  // lifecycle
  created () {},
  beforeCompile () {},
  compiled () {},
  ready () {}, // $el is inserted for the first time
  attached () {},
  detached () {},
  beforeDestroy () {},
  destroyed () {},

  // options
  directives: {},
  elementDirectives: {},
  filters: {},
  components: {},
  transitions: {},
  partials: {}
})
```

### Vue templates
```
// app.vue
<template>
  <h1 class="red"></h1>
</template>
 
<script>
  module.exports = {
    data () {
      return {
        msg: 'Hello world!'
      }
    }
  }
</script> 
```

### HTML Example
```
<div id="my-container">
  <input type="text" @keyup.enter="onSubmit"v-model="firstName"/>
  <button @click="onSubmit">Submit</button>
    {{myValue}}
</div
 
new Vue({
  el: '#my-container',
    methods: {
      onSubmit: function (evt) {
        alert(this.firstName);
        ar button = evt.target;
       }
    },
    data: {
      firstName: '', myValue: 5
    }
  })
```