const getElement = (selector, list) => {
  const el = list
    ? [...document.querySelectorAll(selector)]
    : document.querySelector(selector);

  // check if only one element
  if (list && el.length === 1) return el[0];
  // check if list is not empty
  if (list && el.length > 0) return el;
  // if not a list and element exists
  if (!list && el) return el;
  throw new Error(`Please double check the ${selector}`);
};

let btns = document.querySelectorAll('.sideBtn');
         for (let index = 0; index < btns.length; index++) {
             btns[index].addEventListener('click',()=>{
                 console.log('hello')
             })
             
         }

