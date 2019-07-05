import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ChangecontactComponent } from './changecontact.component';

describe('ChangecontactComponent', () => {
  let component: ChangecontactComponent;
  let fixture: ComponentFixture<ChangecontactComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ChangecontactComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ChangecontactComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
