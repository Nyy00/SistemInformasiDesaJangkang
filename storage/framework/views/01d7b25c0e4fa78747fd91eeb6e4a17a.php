$("#dragable").sortable({
cursor: 'row-resize',
handle: '.fa-sort-alpha-desc',
placeholder: 'ui-state-highlight',
items: '.dragable-handle',
update: function() {
var order = [];
$('tr.dragable-handle').each(function(index, element) {
order.push($(this).attr('data-id'))
})
$.ajax({
type: "POST",
dataType: "json",
url: '<?php echo e($urlDraggable); ?>',
data: {
data: order,
},
success: function(response) {
if (response.status) {
TableData.draw();
} else {
TableData.draw();
}
}
});
}
}).disableSelection();
<?php /**PATH C:\laragon\www\SI_Desa_Jangkang\resources\views/admin/layouts/components/draggable.blade.php ENDPATH**/ ?>