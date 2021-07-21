// origional
a = [{"id": "10", "item": "fridge"}, {"id": "11", "item": "stove"}]
a.forEach(e => console.log(e));

// new
jsondata.forEach((e) => {
  $(`.${e.scheduledate}`).append(e.scheduledate + '<br>');
});