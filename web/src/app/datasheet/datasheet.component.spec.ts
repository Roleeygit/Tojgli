import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DatasheetComponent } from './datasheet.component';

describe('DatasheetComponent', () => {
  let component: DatasheetComponent;
  let fixture: ComponentFixture<DatasheetComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DatasheetComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(DatasheetComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
