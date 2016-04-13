/* INDEX STUFF, MIGHT BE BROKEN */
/*
DROP INDEX IF EXISTS tsv_personName_idx;
DROP INDEX IF EXISTS password_idx;
DROP INDEX IF EXISTS request_student_idx;
DROP INDEX IF EXISTS request_admin_idx;
DROP INDEX IF EXISTS syllabus_course_idx;
DROP INDEX IF EXISTS cu_credits_idx;
DROP INDEX IF EXISTS cuOccurrence_cuID_idx;
DROP INDEX IF EXISTS class_cuOccurrenceID_idx;
DROP INDEX IF EXISTS evaluation_weight_idx;
DROP INDEX IF EXISTS grade_student_eval_idx;
DROP INDEX IF EXISTS grade_eval_idx;
DROP INDEX IF EXISTS grade_grade_idx;
DROP INDEX IF EXISTS group_elements_idx;
DROP INDEX IF EXISTS test_duration_idx;
DROP INDEX IF EXISTS exam_duration_idx;
DROP INDEX IF EXISTS courEnroll_currYear_idx;
DROP INDEX IF EXISTS cuEnroll_finalGra_idx;
DROP INDEX IF EXISTS cuEnroll_student_idx;
*/
DROP INDEX IF EXISTS occurrence_evaluation_idx;


 
-- INDEXES
 
CREATE INDEX occurrence_evaluation_idx ON Evaluation USING btree(occurrenceID,evaluationID);
/*
  -- FULL TEXT INDEXES

CREATE INDEX tsv_personName_idx ON Person USING gin(tsv);

  --OTHER INDEXES

CREATE INDEX password_idx ON Person USING hash(password);

CREATE INDEX request_student_idx ON Request USING hash(studentCode);

CREATE INDEX request_admin_idx ON Request USING hash(adminCode);

CREATE INDEX syllabus_course_idx ON Syllabus USING hash(courseCode);

 
CREATE INDEX cu_credits_idx ON CurricularUnit USING hash(credits);
ALTER TABLE CurricularUnit CLUSTER ON cu_credits_idx;

CREATE INDEX cuOccurrence_cuID_idx ON CurricularUnitOccurrence USING hash(curricularUnitID);
ALTER TABLE CurricularUnitOccurrence CLUSTER ON cuOccurrence_cuID_idx;

CREATE INDEX class_cuOccurrenceID_idx ON Class USING hash(occurrenceID);
ALTER TABLE Class CLUSTER ON class_cuOccurrenceID_idx;

CREATE INDEX evaluation_weight_idx ON Evaluation USING btree(weight);

CREATE INDEX grade_student_eval_idx ON Grade USING hash(studentCode, evaluationID);

CREATE INDEX grade_eval_idx ON Grade USING hash(evaluationID);

CREATE INDEX grade_grade_idx ON Grade USING btree(grade);

CREATE INDEX group_elements_idx ON GroupWork USING btree(maxElements, minElements);

CREATE INDEX test_duration_idx ON Test USING btree(duration);

CREATE INDEX exam_duration_idx ON Exam USING btree(duration);

CREATE INDEX courEnroll_currYear_idx ON CourseEnrollment USING btree(curricularYear);
ALTER TABLE CourseEnrollment CLUSTER ON courEnroll_currYear_idx;

CREATE INDEX cuEnroll_finalGra_idx ON CurricularEnrollment USING btree(finalGrade);
ALTER TABLE CurricularEnrollment CLUSTER ON cuEnroll_finalGra_idx;

CREATE INDEX cuEnroll_student_idx ON CurricularEnrollment USING hash(studentCode);
 */