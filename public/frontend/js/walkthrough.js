
  const tour = new Shepherd.Tour({
    defaultStepOptions: {
      cancelIcon: {
        enabled: true
      },
      classes: 'class-1 class-2',
      scrollTo: { behavior: 'smooth', block: 'center' }
    }
  });
  
  tour.addStep({
    text: `WELCOME !!
     You can take this tour to get started , click next to continue the tour. 
     You could end tour by clicking on the close icon.`,
    attachTo: {
      element: '#startTour',
      on: 'bottom'
    },
    buttons: [
      {
        action() {
          return this.next();
        },
        text: 'Next'
      }
    ],
    id: 'creating'
  });
    
  tour.addStep({
    text: `Click here to go to your Dashboard.`,
    attachTo: {
      element: '#tourStep1',
      on: 'bottom'
    },
    buttons: [
      {
        action() {
          return this.back();
        },
        classes: 'shepherd-button-secondary',
        text: 'Back'
      },
      {
        action() {
          return this.next();
        },
        text: 'Next'
      }
    ],
    id: 'creating'
  });
  
  tour.addStep({
    text: `Click here to add an already existing user on the platform as a connection.`,
    attachTo: {
      element: '.tourStep2',
      on: 'bottom'
    },
    buttons: [
      {
        action() {
          return this.back();
        },
        classes: 'shepherd-button-secondary',
        text: 'Back'
      },
      {
        action() {
          return this.next();
        },
        text: 'Next'
      }
    ],
    id: 'creating'
  });

      
  tour.addStep({
    text: `Click here to add a new user as a connection.`,
    attachTo: {
      element: '.tourStep3',
      on: 'bottom'
    },
    buttons: [
      {
        action() {
          return this.back();
        },
        classes: 'shepherd-button-secondary',
        text: 'Back'
      },
      {
        action() {
          return this.next();
        },
        text: 'DONE'
      }
    ],
    id: 'creating'
  });
  
  
  tour.start();