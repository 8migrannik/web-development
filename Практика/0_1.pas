PROGRAM NumberSystems(INPUT, OUTPUT);
CONST
  NType = [1 .. 109];
  KType =  [2 .. 10];
VAR
  N, K: INTEGER;
  
FUNCTION NFromK(NF, KF: INTEGER): STRING;
CONST 
  DIGIT: STRING[16] = '0123456789';
VAR 
  S: STRING;
BEGIN
  S:='';
  REPEAT
    S := DIGIT[(NF MOD KF) + 1] + S;
    NF := NF DIV KF;
  UNTIL 
    NF = 0;
  NFromK := S
END;

FUNCTION Actions(X: STRING): INTEGER;
VAR
  Sum, Mul, I: INTEGER;
BEGIN
  Sum := 0;
  Mul := 1;
  
  FOR I := 1 TO Length(X)
  DO
    BEGIN
      Sum := Sum + (ord(X[I]) - 48);
      Mul := Mul * (ord(X[I]) - 48)
    END;
  Actions := Mul - Sum
END;
  
BEGIN
  WRITELN('Please enter a number between 1 and 109:');
  READ(N);
  IF N IN NType
  THEN
    BEGIN
      WRITELN('Insert the base of the system from 2 to 10:');
      READ(K);
      IF K IN KType
      THEN
        BEGIN
          WRITELN('Result:');
          WRITELN(Actions(NFromK(N, K)))
        END
      ELSE
        WRITELN('The entered number K does not meet the condition')
    END
  ELSE
    WRITELN('The entered number N does not meet the condition')
END. 
  
