CREATE OR REPLACE FUNCTION getExamsCurricularOccurrenceID(id INTEGER) 
RETURNS INTEGER AS $$
DECLARE
result INTEGER;
BEGIN
 SELECT Evaluation.cuOccurrenceID INTO result
 FROM Evaluation,CurricularUnitOccurrence,Exam
 WHERE  CurricularUnitOccurrence.cuOccurrenceID = id AND Evaluation.cuOccurrenceID = id AND Exam.evaluationID = Evaluation.evaluationID AND
 Evaluation.visible = 1 AND CurricularUnitOccurrence.visible=1 AND  Exam.visible=1;
return result;
END 
$$ LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION onlyOneExam() RETURNS trigger AS $$
 DECLARE
 numberOfExams INTEGER;
 curricular INTEGER;
BEGIN
 curricular:=getExamsCurricularOccurrenceID(NEW.cuOccurrenceID);
 SELECT COUNT(*) INTO numberOfExams
 FROM Evaluation
 WHERE Evaluation.cuOccurrenceID = curricular AND
 Evaluation.visible = 1;
 IF(numberOfExams > 1)
 THEN
 RETURN RAISE EXCEPTION 'Only 1 exam per Occurrence is allowed';
 ELSE
  RETURN NEW;
  END IF;
END $$ LANGUAGE 'plpgsql';

CREATE TRIGGER oneExamPerUC
BEFORE INSERT ON Exam
FOR EACH ROW
EXECUTE PROCEDURE onlyOneExam();