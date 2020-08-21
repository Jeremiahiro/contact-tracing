$(function () {

    // Multiple instantiation (divs 1 and 2)

    $('#my_calendar_calSize').rescalendar({
        id: 'my_calendar_calSize',
        jumpSize: 2,
        calSize: 4,
        //data: [{
        //       id: 1,
        //       name: 'item1',
        //     startDate: '2019-03-01',
        //     endDate: '2019-03-03',
        //    customClass: 'greenClass'
        //},
        // {
        //    id: 2,
        //   name: 'item2',
        //   startDate: '2019-03-05',
        //   endDate: '2019-03-15',
        //  customClass: 'blueClass',
        // title: 'Title 2 en'
        //}
        // ],

        dataKeyField: 'name',
        dataKeyValues: ['item1', 'item2', 'item3', 'item4', 'item5']
    });

});
