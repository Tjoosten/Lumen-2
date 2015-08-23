/* ==========================================================
 * issue-guidelines.js
 * http://twitter.github.com/bootstrap/javascript.html#alerts
 * ==========================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */

var assert = require('assert')

module.exports = {

    'issues': {

        'before': function (issue) {
            var plus   = {}
            var labels = issue.labels.map(function (label) { return label.name });

            if (~labels.indexOf('popular')) return

            issue.comments.forEach(function (comment) {
                if (/\+1/.test(comment.body)) plus[comment.user.login] = true
            })

            if (Object.keys(plus).length > 5) {
                issue.tag('popular')
                issue.comment('Tagging this issue as popular, please stop commenting on this issue with +1. thanks!')
            }
        },

        'should include a jsfiddle/jsbin illustrating the problem if tagged with js but not a feature': function (issue) {
            var labels = issue.labels.map(function (label) { return label.name });
            if (~labels.indexOf('js') && !~labels.indexOf('feature')) assert.ok(/(jsfiddle|jsbin)/.test(issue.body))
        },

        'after': function (issue) {
            if (issue.reporter.stats.failures) {
                issue.reportFailures(issue.close.bind(issue))
            }
        }

    }

}
