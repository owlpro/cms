import React from 'react';
import Select, { components } from 'react-select';
import ReactSimpleBar from 'simplebar-react';
import SimpleBar from 'simplebar';

import Playground from 'simplebar/demo/Playground';

import 'simplebar/src/simplebar.css';

import './browser/css/demo.css';

if (typeof Promise === 'undefined') {
  // Rejection tracking prevents a common issue where React gets into an
  // inconsistent state due to an error, but it gets swallowed by a Promise,
  // and the user has no idea what causes React's erratic future behavior.
  require('promise/lib/rejection-tracking').enable();
  window.Promise = require('promise/lib/es6-extensions.js');
}

function MenuList({ children, ...otherProps }) {
  return (
    <ReactSimpleBar style={{ maxHeight: 300 }}>
      <components.MenuList {...otherProps} maxHeight="none">
        {children}
      </components.MenuList>
    </ReactSimpleBar>
  );
}

class Demo extends React.Component {
  componentDidMount() {
    new SimpleBar(document.getElementById('manual-instantiation'));
    new SimpleBar(document.getElementById('with-classnames'), {
      classNames: { vertical: 'my-custom-class' }
    });

    for (let scrollArea of document.getElementsByClassName('demo-nested')) {
      new SimpleBar(scrollArea, {
        autoHide: false
      });
    }
  }

  render() {
    return (
      <section>
        <h1>Simplebar demo page</h1>
        <section>
          <div className="col">
            <h2>Default</h2>
            <div id="demo1" className="demo1" data-simplebar>
              <h3 className="sticky">Sticky header</h3>
              {[...Array(50)].map((x, i) => (
                <p key={i} className="odd">
                  Some content
                </p>
              ))}
            </div>
          </div>
          <div className="col">
            <h2>autoHide false</h2>
            <div
              id="demo2"
              className="demo1"
              data-simplebar
              data-simplebar-auto-hide="false"
            >
              {[...Array(10)].map((x, i) => (
                <p key={i} className="odd">
                  Some content
                </p>
              ))}
            </div>
          </div>
        </section>
        <section>
          <div className="col">
            <h2>forceVisible true</h2>
            <div
              id="demo3"
              className="demo1"
              data-simplebar
              data-simplebar-force-visible
            >
              {[...Array(5)].map((x, i) => (
                <p key={i} className="odd">
                  Some content
                </p>
              ))}
            </div>
          </div>
          <div className="col">
            <h2>direction RTL</h2>
            <div
              className={'demo4 demo-rtl'}
              style={{ width: '200px', direction: 'rtl' }}
              data-simplebar
            >
              <div className="box">1</div>
              <div className="box">2</div>
              <div className="box">3</div>
              <div className="box">4</div>
              <div className="box">5</div>
            </div>
          </div>
        </section>
        <section>
          <div className="col">
            <h2>React-Select</h2>
            <Select
              components={{
                MenuList
              }}
              options={[...Array(50)].map((x, i) => ({
                value: i,
                label: i
              }))}
            />
          </div>
          <div className="col">
            <h2>Horizontal</h2>
            <Playground width height direction>
              {({ height, width, direction }) => (
                <div style={{ width: '200px', height: '200px' }}>
                  <div
                    data-simplebar
                    className="demo4"
                    style={{ height, width, direction }}
                  >
                    <div className="box">1</div>
                    <div className="box">2</div>
                    <div className="box">3</div>
                    <div className="box">4</div>
                    <div className="box">5</div>
                  </div>
                </div>
              )}
            </Playground>
          </div>
        </section>
        <section>
          <div className="col">
            <h2>Manual instantiation</h2>
            <div
              id="manual-instantiation"
              className="demo4"
              style={{ width: '200px' }}
            >
              <div className="box">1</div>
              <div className="box">2</div>
              <div className="box">3</div>
              <div className="box">4</div>
              <div className="box">5</div>
            </div>
          </div>
          <div className="col">
            <h2>Horizontal native</h2>
            <div className="demo4" style={{ width: '200px' }}>
              <div className="box">1</div>
              <div className="box">2</div>
              <div className="box">3</div>
              <div className="box">4</div>
              <div className="box">5</div>
            </div>
          </div>
        </section>
        <section>
          <div className="col">
            <h2>Both axis</h2>
            <div className="demo-both-axis" data-simplebar>
              <div className="box">1</div>
            </div>
          </div>
          <div className="col">
            <h2>Both axis + padding</h2>
            <div
              className="demo-both-axis demo-both-axis--padding"
              data-simplebar
            >
              <div className="box">1</div>
            </div>
          </div>
        </section>
        <section>
          <div className="col">
            <h2>Both axis + padding native</h2>
            <div className="demo-both-axis demo-both-axis--padding">
              <div className="box">1</div>
            </div>
          </div>
          <div className="col">
            <h2>Y axis only</h2>
            <div className="demo-y-axis" data-simplebar>
              <div className="box">1</div>
            </div>
          </div>
        </section>
        <section>
          <div className="col">
            <h2>With custom classnames</h2>
            <div
              id="with-classnames"
              className="demo4"
              style={{ width: '200px' }}
            >
              <div className="box">1</div>
              <div className="box">2</div>
              <div className="box">3</div>
              <div className="box">4</div>
              <div className="box">5</div>
            </div>
          </div>
          <div className="col">
            <h2>Nested</h2>
            <div className="demo-nested demo1">
              <div className="demo-nested demo1" style={{ height: '200px' }}>
                {[...Array(50)].map((x, i) => (
                  <p key={i} className="odd">
                    Some content
                  </p>
                ))}
              </div>
              {[...Array(50)].map((x, i) => (
                <p key={i} className="odd">
                  Some content
                </p>
              ))}
            </div>
          </div>
        </section>
        <section>
          <h2>Flex layout</h2>
          <Playground width>
            {({ width }) => (
              <div className="demo-flex">
                <div className="left" data-simplebar>
                  <div className="content" />
                </div>
                <div className="center" data-simplebar>
                  <div className="content" />
                </div>
                <div className="right" data-simplebar style={{ width }}>
                  <div className="content" />
                </div>
              </div>
            )}
          </Playground>
        </section>
        <section>
          <div className="col">
            <h2>forceVisible true</h2>
            <div className="demo-height-auto" data-simplebar>
              <div className="inner">
                {[...Array(5)].map((x, i) => (
                  <p key={i} className="odd">
                    Some content
                  </p>
                ))}
              </div>
            </div>
          </div>
        </section>
      </section>
    );
  }
}

export default Demo;
